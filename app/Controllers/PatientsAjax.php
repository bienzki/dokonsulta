<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\UserModel;
use App\Models\FavoriteModel;
use App\Models\NotificationModel;

class PatientsAjax extends BaseController
{
    public function appointment()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url', 'text']);
            $errors = '';
            $error = 'no';
            $success = 'no';
            $message = '';

            $error = $this->validate([
                'clinic' => [
                    'rules' => 'checkClinic[clinic,type]',
                    'errors' => [
                        'checkClinic' => 'The clinic field is required.'
                    ]
                ],
                'date' => [
                    'rules' => 'required|valid_date[Y-m-d H:i]|isFuture',
                    'errors' => [
                        'isFuture' => 'The date field must contain a future or present date.'
                    ]
                ],
                'problem' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please tell us about your problem.'
                    ]
                ],
                'problemStart' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please tell us when does the problem started.'
                    ]
                ],
                'height' => [
                    'rules' => 'reqDec',
                    'errors' => [
                        'reqDec' => 'The height field must contain only numbers.'
                    ]
                ],
                'weight' => [
                    'rules' => 'reqDec',
                    'errors' => [
                        'reqDec' => 'The weight field must contain only numbers.'
                    ]
                ],
                'temperature' => [
                    'rules' => 'reqDec',
                    'errors' => [
                        'reqDec' => 'The temperature field must contain only numbers.'
                    ]
                ],
                'agree' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'You must agree to our terms and condition'
                    ]
                ]

            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                $errors = $validation->listErrors();
            } else {
                $success = 'yes';
                $appointmentModel = new AppointmentModel();
                $notificationModel = new NotificationModel();

                if ($this->request->getVar('type') == 'clinic') {
                    $type = 'Clinic Visit';
                    $msg = 'has booked you for a clinic visit appointment.';
                } else {
                    $type = 'E-consultation';
                    $msg = 'has booked you for an e-consultation appointment.';
                }

                $file = $this->request->getFile('file');
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('./assets/files');
                }

                $appointmentModel->save([
                    'doctorId' => $this->request->getVar('doctorId'),
                    'patientId' => session()->get('id'),
                    'clinicId' => $this->request->getVar('clinic'),
                    'date' => $this->request->getVar('date'),
                    'problem' => $this->request->getVar('problem'),
                    'problemStart' => $this->request->getVar('problemStart'),
                    'medication' => $this->request->getVar('medication'),
                    'allergy' => $this->request->getVar('allergy'),
                    'height' => $this->request->getVar('height'),
                    'weight' => $this->request->getVar('weight'),
                    'temperature' => $this->request->getVar('temperature'),
                    'info' => $this->request->getVar('info'),
                    'file' => $file->getName(),
                    'type' => $type,
                    'status' => 'pending',
                ]);
                $notificationModel->save([
                    'toUser' => $this->request->getVar('doctorId'),
                    'fromUser' => session()->get('id'),
                    'message' => $msg,
                    'isSeen' => '0'
                ]);
            }

            $output = array(
                'errors' => $errors,
                'error' => $error,
                'success' => $success,
                'message' => $message
            );

            echo json_encode($output);
        } else {
            return view('errors/html/error_404');
        }
    }


    public function date()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);
            $dateError = '';
            $error = 'no';
            $success = 'no';

            $error = $this->validate([
                'date' => [
                    'rules' => 'required|valid_date[Y-m-d H:i]|isFuturePresent',
                    'errors' => [
                        'isFuturePresent' => 'The date field must contain a future or present date.'
                    ]
                ]
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('date')) {
                    $dateError = $validation->getError('date');
                }
            }

            $output = array(
                'dateError' => $dateError,
                'error' => $error,
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function problem()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);
            $problemError = '';
            $error = 'no';
            $success = 'no';

            $error = $this->validate([
                'problem' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please tell us about your problem.'
                    ]
                ]
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('problem')) {
                    $problemError = $validation->getError('problem');
                }
            }

            $output = array(
                'problemError' => $problemError,
                'error' => $error,
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function problemStart()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);
            $problemStartError = '';
            $error = 'no';
            $success = 'no';

            $error = $this->validate([
                'problemStart' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please tell us when does the problem started.'
                    ]
                ]
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('problemStart')) {
                    $problemStartError = $validation->getError('problemStart');
                }
            }

            $output = array(
                'problemStartError' => $problemStartError,
                'error' => $error,
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function height()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);
            $heightError = '';
            $error = 'no';
            $success = 'no';

            $error = $this->validate([
                'height' => [
                    'rules' => 'reqDec',
                    'errors' => [
                        'reqDec' => 'The height field must contain only numbers.'
                    ]
                ]
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('height')) {
                    $heightError = $validation->getError('height');
                }
            }

            $output = array(
                'heightError' => $heightError,
                'error' => $error,
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function weight()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);
            $weightError = '';
            $error = 'no';
            $success = 'no';

            $error = $this->validate([
                'weight' => [
                    'rules' => 'reqDec',
                    'errors' => [
                        'reqDec' => 'The weight field must contain only numbers.'
                    ]
                ]
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('weight')) {
                    $weightError = $validation->getError('weight');
                }
            }

            $output = array(
                'weightError' => $weightError,
                'error' => $error,
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function temperature()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);
            $temperatureError = '';
            $error = 'no';
            $success = 'no';

            $error = $this->validate([
                'temperature' => [
                    'rules' => 'reqDec',
                    'errors' => [
                        'reqDec' => 'The temperature field must contain only numbers.'
                    ]
                ]
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('temperature')) {
                    $temperatureError = $validation->getError('temperature');
                }
            }

            $output = array(
                'temperatureError' => $temperatureError,
                'error' => $error,
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function favorite()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form', 'url']);

            $success = 'yes';

            $favoriteModel = new FavoriteModel();

            $favoriteModel->insert([
                'patientId' => session()->get('id'),
                'doctorId' => $this->request->getVar('doctorId'),
            ]);

            $output = array(
                'success' => $success,
            );

            echo json_encode($output);
        }
    }

    public function search()
    {
        $a = '';
        $searchName = $this->request->getVar('searchName');
        $searchCity = $this->request->getVar('searchCity');
        $searchSpecialty = $this->request->getVar('searchSpecialty');
        $limit = $this->request->getVar('limit');
        $offset = $this->request->getVar('offset');

        $userModel = new UserModel();

        $doctors = $userModel->where('status', 'verified')->where('type', 'doctor')->findAll(5);

        $doctors = $userModel->groupStart()->like('firstname', $searchName)->orLike('middleName', $searchName)->orLike('lastName', $searchName)->groupEnd()
            ->like('city', $searchCity)->like('specialty', $searchSpecialty)->where('type', 'doctor')->where('status', 'verified')
            ->join('doctor', 'users.id = doctor.doctorId')->findAll($limit, $offset);

        $found = $userModel->groupStart()->like('firstname', $searchName)->orLike('middleName', $searchName)->orLike('lastName', $searchName)->groupEnd()
            ->like('city', $searchCity)->like('specialty', $searchSpecialty)->where('type', 'doctor')->where('status', 'verified')
            ->join('doctor', 'users.id = doctor.doctorId')->findAll();

        // $a .= '<div class="container pb-4">Records Found: ' . count($doctors) . '</div>';

        if (count($doctors) > 0) {
            foreach ($doctors as $doctor) :
                $a .= '
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-6 animate__animated animate__fadeInUp">
                    <div class="dash-widget2">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-xl-7 col-lg-7 col-md-7">
                                <span class="dash-widget-icon">
                                    <a href="/patients/doctor/' . $doctor['slug'] . '"><img alt="" src="/assets/img/users/' . $doctor['image'] . '"></a>
                                </span>
                                <div class="dash-widget-info" style="position: relative; margin-left: 100px; margin-top: 20px;">
                                    <h4 class="doctor-name text-ellipsis"><a href="/patients/doctor/' . $doctor['slug'] . '">Dr. ' . $doctor['firstName'] . ' ' . $doctor['lastName'] . '</a></h4>
                                    <div class="doc-prof">' . $doctor['specialty'] . '</div>
                                    <div class="user-country">
                                        <i class="fa fa-map-marker"></i> ' . $doctor['city'] . ', ' . $doctor['province'] . '
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5">
                                <div class="doctor-button">
                                    <a class="btn btn-primary btn-primary-two btn-sm book-button" href="/patients/book/' . $doctor['slug'] . '">Book</a>
                                    <a class="btn btn-primary btn-primary-two btn-sm" href="/patients/doctor/' . $doctor['slug'] . '">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            endforeach;
        }
        //  else {
        //   $output .= '
        // <div class="col-12 text-center">
        //   <img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100" />
        //   <h3 class="pt-4">No Doctors Found</h3>
        //   <p>Try another name or specialty to find a doctor in your search</p>
        // </div>
        //   ';
        // }

        $output = array(
            'a' => $a,
            'found' => count($found),
            'current' => count($doctors)
        );

        echo json_encode($output);
    }
}
