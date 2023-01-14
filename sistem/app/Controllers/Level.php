<?php

namespace App\Controllers;

class Level extends BaseController {

    public function index() {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            // $LvlIdHis = $this->MLevelUp->select('level_id')->where('user_id', session('user_id'))->where('status', 'success')->findAll();
            $LvlIdUser = [$this->MUser->select('level_id')->where('id', session('user_id'))->first()['level_id']];

            $resultIdHist = [];
            // foreach ($LvlIdHis as $key => $value) {
            //     $resultIdHist [] = (int) $value['level_id'];
            // }
            
            $id_rules = array_merge($resultIdHist, $LvlIdUser);

        	$data = array_merge($this->base_data, [
        		'title' => 'Upgrade Level',
        		'current_level' => $this->MLevel->select('level_name')->where('id' , $this->MUser->select('level_id')->where('id', session('user_id'))->first()['level_id'])->first()['level_name'],
                'level_list' => $this->MLevel->whereNotIn('id', $id_rules)->findAll(),
                'histori_list' => $this->MLevelUp->findAll(),
                'method' => $this->M_Base->all_data('method'),
            ]);

            return view('Level/index', $data);
        }
    }

    public function upgrade($levelUpId = null) {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $data_post = [
                'level_id' => addslashes(trim(htmlspecialchars($this->request->getPost('level_id')))),
                'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
            ];

            if (empty($data_post['level_id'])) {
                $this->session->setFlashdata('error', 'Pilihan level tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['method'])) {
                $this->session->setFlashdata('error', 'Metode tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $method = $this->M_Base->data_where('method', 'id', $data_post['method']);

                if (count($method) === 1) {
                    if ($method[0]['status'] == 'On') {

                        $upgrade_id = '';
                        $level = $this->MLevel->select('id, level_name, price')->where('id', $data_post['level_id'])->first();


                        if ($method[0]['provider'] == 'Tripay') {

                            $data = [
                                'method'         => $method[0]['code'],
                                'merchant_ref'   => $upgrade_id,
                                'amount'         => $level['price'],
                                'customer_name'  => $this->users['username'],
                                'customer_email' => 'email@domain.com',
                                'customer_phone' => $this->users['wa'],
                                'order_items'    => [
                                    [
                                        'sku'         => 'DS',
                                        'name'        => 'Upgrade Member',
                                        'price'       => $level['price'],
                                        'quantity'    => 1,
                                    ]
                                ],
                                'return_url'   => base_url(),
                                'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
                                'signature'    => hash_hmac('sha256', $this->M_Base->u_get('tripay-merchant').$upgrade_id.$level['price'], $this->M_Base->u_get('tripay-private'))
                            ];

                            $curl = curl_init();

                            curl_setopt_array($curl, [
                                CURLOPT_FRESH_CONNECT  => true,
                                CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HEADER         => false,
                                CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$this->M_Base->u_get('tripay-key')],
                                CURLOPT_FAILONERROR    => false,
                                CURLOPT_POST           => true,
                                CURLOPT_POSTFIELDS     => http_build_query($data),
                                CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
                            ]);

                            $result = curl_exec($curl);
                            $result = json_decode($result, true);

                            
                            if ($result) {
                                if ($result['success'] == true) {
                                    if (array_key_exists('qr_url', $result['data'])) {
                                        $payment_code = $result['data']['qr_url'];
                                    } else {
                                        $payment_code = $result['data']['pay_code'];
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Result : ' . $result['message']);
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Gagal terkoneksi ke Tripay');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }

                        } else if ($method[0]['provider'] == 'Manual') {
                            $payment_code = $method[0]['rek'];
                        } else {
                            $this->session->setFlashdata('error', 'Metode tidak terdaftar');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }

                        if($this->MLevelUp->save([
                            'code' => date('YmdHis'),
                            'level_id' => $level['id'],
                            'level_name' => $level['level_name'],
                            'user_id' => session('user_id'),
                            'method_id' => $method[0]['id'],
                            'method_name' => $method[0]['method'],
                            'price' => $level['price'],
                            'status' => 'Pending',
                            'payment_code' => $payment_code,
                        ])){
                            $this->session->setFlashdata('success', 'Request upgrade berhasil dilakukan, silahkan melakukan pembayaran');

                            return redirect()->to(base_url() . '/user/level/upgrade-detail/' . $this->MLevelUp->insertId());
                        } else {
                            $this->session->setFlashdata('error', 'Request upgrade gagal dilakukan!');

                            return redirect()->to(base_url() . '/user/level');
                        }


                    } else {
                        $this->session->setFlashdata('error', 'Metode tidak tersedia');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Metode tidak ditemukan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
               
        }
    }

    public function detail($id = null){
        $levelUp = $this->MLevelUp->where('id', $id)->first();
        $find_method = $this->M_Base->data_where('method', 'id', $levelUp['method_id']);

        $instruksi = count($find_method) == 1 ? $find_method[0]['instruksi'] : '-';

        $data = array_merge($this->base_data, [
            'title' => 'Top Up',
            'level_up' => array_merge($levelUp, [
                'instruksi' => $instruksi,
            ]),
        ]);

        return view('Level/detail', $data);
    }
}
