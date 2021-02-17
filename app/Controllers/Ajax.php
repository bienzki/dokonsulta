<?php

namespace App\Controllers;

use App\Models\ProvinceModel;
use App\Models\CityModel;
use App\Models\UserModel;
use App\Models\DoctorModel;
use App\Controllers\Email;

class Ajax extends BaseController
{
  public function patient()
  {
    if ($this->request->getVar('action')) {
      helper(['form', 'url', 'text']);
      $errors = '';
      $error = 'no';
      $success = 'no';
      $message = '';

      $error = $this->validate([
        'firstName' => [
          'rules' => 'required',
          'label' => 'firstname'
        ],
        'lastName' => [
          'rules' => 'required',
          'label' => 'lastname'
        ],
        'birthday' => [
          'rules' => 'required|valid_date[Y-m-d]|isPastPresent',
          'errors' => [
            'isPastPresent' => 'The birthday field must contain a past or present date.'
          ]
        ],
        'gender' => 'required|in_list[Male, Female]',
        'civilStatus' => [
          'rules' => 'required|in_list[Single, Married, Widowed]',
          'label' => 'civil status'
        ],
        'bloodType' => [
          'rules' => 'in_list[A+, A-, AB+, AB-, B+, B-, O+, O-, ]',
          'label' => 'blood type'
        ],
        'mobile' => [
          'rules' => 'required|numeric|exact_length[11]|startZero',
          'label' => 'mobile no.',
          'errors' => [
            'startZero' => 'The mobile number should start with 0.'
          ]
        ],
        'email' => [
          'rules' => 'required|valid_email|is_unique[users.email]',
          'label' => 'email address',
          'errors' => [
            'is_unique' => 'The email address already exist'
          ]
        ],
        'password' => 'required|min_length[8]',
        'confirm_password' => [
          'rules' => 'matches[password]',
          'errors' => [
            'matches' => 'The password did not match'
          ]
        ],
        'province' => 'required',
        'city' => 'required',
        'barangay' => 'required',
        'street' => 'required',
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
        $email = new Email();
        $crudModel = new UserModel();

        $title = strtolower($this->request->getVar('firstName'));
        $title .= ' ' . strtolower($this->request->getVar('middleName'));
        $title .= ' ' . strtolower($this->request->getVar('lastName'));
        $title .= ' ' . strtolower($this->request->getVar('suffix'));

        $ids = $crudModel->selectMax('id')->get()->getResult();

        foreach ($ids as $id) {
          $i = $id->id;
        }

        $title .= ' ' . ((int)$i + 1);
        $userId = ((int)$i + 1);

        $slug = url_title($title);

        $token = $userId . random_string('alnum', 8);

        if ($email->verifyuser($this->request->getVar('email'), $token)) {
          $success = 'yes';
          if ($this->request->getVar('action') == 'Add') {
            $cityModel = new CityModel();
            $city = $cityModel->where('cityId', $this->request->getVar('city'))->first();
            $provinceModel = new ProvinceModel();
            $province = $provinceModel->where('provinceId', $this->request->getVar('province'))->first();

            $avatar = $this->avatar(ucwords($this->request->getVar('firstName')[0]));



            $crudModel->save([
              'firstName'    =>  ucwords($this->request->getVar('firstName')),
              'middleName'    =>  ucwords($this->request->getVar('middleName')),
              'lastName'    =>  ucwords($this->request->getVar('lastName')),
              'suffix'    =>  ucwords($this->request->getVar('suffix')),
              'birthday'  =>  $this->request->getVar('birthday'),
              'gender'  =>  $this->request->getVar('gender'),
              'civilStatus'  =>  $this->request->getVar('civilStatus'),
              'bloodType'  =>  $this->request->getVar('bloodType'),
              'mobile'  =>  $this->request->getVar('mobile'),
              'email'  =>  $this->request->getVar('email'),
              'password'  =>  $this->request->getVar('password'),
              'province'  =>  ucwords(strtolower($province['name'])),
              'city'  =>  ucwords(strtolower($city['name'])),
              'barangay'  =>  $this->request->getVar('barangay'),
              'street'  =>  $this->request->getVar('street'),
              'status' => 'unverified',
              'image' => $avatar,
              'type' => 'patient',
              'token' => $token,
              'slug' => $slug
            ]);

            session()->set(['email' => $this->request->getVar('email'), 'token' => $token]);
          }
        } else {
          $error = 'yes';
          $errors = 'There was an error with the server, please try again later.';
        }
      }

      $output = array(
        'errors' => $errors,
        'error' => $error,
        'success' => $success,
        'message' => $message
      );

      echo json_encode($output);
    }
  }

  public function doctor()
  {
    if ($this->request->getVar('action')) {
      helper(['form', 'url', 'text']);
      $errors = '';
      $error = 'no';
      $success = 'no';
      $message = '';

      $error = $this->validate([
        'firstName' => [
          'rules' => 'required',
          'label' => 'firstname'
        ],
        'lastName' => [
          'rules' => 'required',
          'label' => 'lastname'
        ],
        'prcLicense' => [
          'rules' => 'required',
          'label' => 'PRC license no.'
        ],
        'specialty' => [
          'rules' => 'required',
          'label' => 'specialty / practices'
        ],
        'gender' => 'required|in_list[Male, Female]',
        'mobile' => [
          'rules' => 'required|numeric|exact_length[11]|startZero',
          'label' => 'mobile no.',
          'errors' => [
            'startZero' => 'The mobile number should start with 0.'
          ]
        ],
        'password' => 'required|min_length[8]',
        'confirm_password2' => [
          'rules' => 'matches[password]',
          'errors' => [
            'matches' => 'The password did not match'
          ]
        ],
        'email' => [
          'rules' => 'required|valid_email|is_unique[users.email]',
          'label' => 'email address',
          'errors' => [
            'is_unique' => 'The email address already exist'
          ]
        ],
        'birthday' => [
          'rules' => 'required|valid_date[Y-m-d]|isPastPresent',
          'errors' => [
            'isPastPresent' => 'The birthday field must contain a past or present date.'
          ]
        ],
        'prcId' => [
          'rules' => 'is_image[prcId]|uploaded[prcId]',
          'errors' => [
            'is_image' => 'PRC ID is not a valid image file.',
            'uploaded' => 'The PRC ID field is required'
          ]
        ],
        'signature' => [
          'rules' => 'is_image[signature]|uploaded[signature]',
          'errors' => [
            'is_image' => 'Signature is not a valid image file.',
            'uploaded' => 'The signature field is required'
          ]
        ],
        'province' => 'required',
        'city' => 'required',
        'barangay' => 'required',
        'street' => 'required',
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
        if ($this->request->getVar('action') == 'Add') {
          $crudModel = new UserModel();
          $doctorModel = new DoctorModel();

          $specialty = '';
          $array = array();
          $array = $this->request->getPost('specialty[]');
          $counter = 0;
          foreach ($array as $arr) {
            if (count($array) - 1 > $counter) {
              $specialty .= $arr . ', ';
            } else {
              $specialty .= $arr;
            }
            $counter++;
          }

          $title = strtolower($this->request->getVar('firstName'));
          $title .= ' ' . strtolower($this->request->getVar('middleName'));
          $title .= ' ' . strtolower($this->request->getVar('lastName'));
          $title .= ' ' . strtolower($this->request->getVar('suffix'));

          $ids = $crudModel->selectMax('id')->get()->getResult();

          foreach ($ids as $id) {
            $i = $id->id;
          }

          $title .= ' ' . ((int)$i + 1);

          $doctorId = ((int)$i + 1);
          $slug = url_title($title);

          $prcId = $this->request->getFile('prcId');
          $signature = $this->request->getFile('signature');
          if ($prcId->isValid() && !$prcId->hasMoved()) {
            $prcId->move('./assets/img/prcid');
          }
          if ($signature->isValid() && !$signature->hasMoved()) {
            $signature->move('./assets/img/signature');
          }

          $cityModel = new CityModel();
          $city = $cityModel->where('cityId', $this->request->getVar('city'))->first();
          $provinceModel = new ProvinceModel();
          $province = $provinceModel->where('provinceId', $this->request->getVar('province'))->first();

          $avatar = $this->avatar(ucwords($this->request->getVar('firstName')[0]));

          $crudModel->save([
            'firstName'    =>  ucwords($this->request->getVar('firstName')),
            'middleName'    =>  ucwords($this->request->getVar('middleName')),
            'lastName'    =>  ucwords($this->request->getVar('lastName')),
            'suffix'    =>  ucwords($this->request->getVar('suffix')),
            'birthday'  =>  $this->request->getVar('birthday'),
            'gender'  =>  $this->request->getVar('gender'),
            'mobile'  =>  $this->request->getVar('mobile'),
            'email'  =>  $this->request->getVar('email'),
            'password'  =>  $this->request->getVar('password'),
            'province'  =>  ucwords(strtolower($province['name'])),
            'city'  =>  ucwords(strtolower($city['name'])),
            'barangay'  =>  $this->request->getVar('barangay'),
            'street'  =>  $this->request->getVar('street'),
            'status' => 'unverified',
            'image' => $avatar,
            'type' => 'doctor',
            'token' => $doctorId . random_string('alnum', 8),
            'slug' => $slug
          ]);
          $doctorModel->insert([
            'doctorId'    =>  $doctorId,
            'specialty'    =>  $specialty,
            'prcLicense'    =>  $this->request->getVar('prcLicense'),
            's2License'    =>  $this->request->getVar('s2License'),
            'ptrNo'  =>  $this->request->getVar('ptrNo'),
            'signature' => $signature->getName(),
            'prcId' => $prcId->getName()
          ]);
        }
      }

      $output = array(
        'errors' => $errors,
        'error' => $error,
        'success' => $success,
        'message' => $message
      );

      echo json_encode($output);
    }
  }

  protected function avatar($character)
  {
    $path = './assets/img/users/' . time() . '.png';

    $font = realpath('./assets/fonts/arial.ttf');

    $image = imagecreate(500, 500);

    $red = rand(0, 255);

    $green = rand(0, 255);

    $blue = rand(0, 255);

    imagecolorallocate($image, $red, $green, $blue);

    $textcolor = imagecolorallocate($image, 255, 255, 255);

    imagettftext($image, 250, 0, 137.5, 375, $textcolor, $font, $character);

    header('Conten-type: image/png');

    imagepng($image, $path);

    imagedestroy($image);

    $path = explode('/', $path);

    $path = end($path);

    return $path;
  }


  public function firstName()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $firstNameError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'firstName' => [
          'rules' => 'required',
          'label' => 'firstname'
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('firstName')) {
          $firstNameError = $validation->getError('firstName');
        }
      }

      $output = array(
        'firstNameError' => $firstNameError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function lastName()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $lastNameError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'lastName' => [
          'rules' => 'required',
          'label' => 'lastname'
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('lastName')) {
          $lastNameError = $validation->getError('lastName');
        }
      }

      $output = array(
        'lastNameError' => $lastNameError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function birthday()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $birthdayError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'birthday' => [
          'rules' => 'required|valid_date[Y-m-d]|isPastPresent',
          'errors' => [
            'isPastPresent' => 'The birthday field must contain a past or present date.'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('birthday')) {
          $birthdayError = $validation->getError('birthday');
        }
      }

      $output = array(
        'birthdayError' => $birthdayError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }


  public function gender()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $genderError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['gender' => 'required|in_list[Male, Female]']);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('gender')) {
          $genderError = $validation->getError('gender');
        }
      }

      $output = array(
        'genderError' => $genderError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function civilStatus()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $civilStatusError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'civilStatus' => [
          'rules' => 'required|in_list[Single, Married, Widowed]',
          'label' => 'civil status'
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('civilStatus')) {
          $civilStatusError = $validation->getError('civilStatus');
        }
      }

      $output = array(
        'civilStatusError' => $civilStatusError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function bloodType()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $bloodTypeError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'bloodType' => [
          'rules' => 'in_list[A+, A-, AB+, AB-, B+, B-, O+, O-, ]',
          'label' => 'blood type'
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('bloodType')) {
          $bloodTypeError = $validation->getError('bloodType');
        }
      }

      $output = array(
        'bloodTypeError' => $bloodTypeError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function mobile()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $mobileError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'mobile' => [
          'rules' => 'required|numeric|exact_length[11]|startZero',
          'label' => 'mobile no.',
          'errors' => [
            'startZero' => 'The mobile number should start with 0.'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('mobile')) {
          $mobileError = $validation->getError('mobile');
        }
      }

      $output = array(
        'mobileError' => $mobileError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function email()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $emailError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'email' => [
          'rules' => 'required|valid_email|is_unique[users.email]',
          'label' => 'email address',
          'errors' => [
            'is_unique' => 'The email address already exist'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('email')) {
          $emailError = $validation->getError('email');
        }
      }

      $output = array(
        'emailError' => $emailError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function password()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $passwordError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['password' => 'required|min_length[8]']);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('password')) {
          $passwordError = $validation->getError('password');
        }
      }

      $output = array(
        'passwordError' => $passwordError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function confirm_password()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $confirm_passwordError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'confirm_password' => [
          'rules' => 'matches[password]',
          'errors' => [
            'matches' => 'The password did not match'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('confirm_password')) {
          $confirm_passwordError = $validation->getError('confirm_password');
        }
      }

      $output = array(
        'confirm_passwordError' => $confirm_passwordError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function confirm_password2()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $confirm_password2Error = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'confirm_password2' => [
          'rules' => 'matches[password]',
          'errors' => [
            'matches' => 'The password did not match'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('confirm_password2')) {
          $confirm_password2Error = $validation->getError('confirm_password2');
        }
      }

      $output = array(
        'confirm_password2Error' => $confirm_password2Error,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function province()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $provinceError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['province' => 'required']);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('province')) {
          $provinceError = $validation->getError('province');
        }
      }

      $output = array(
        'provinceError' => $provinceError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function city()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $cityError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['city' => 'required']);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('city')) {
          $cityError = $validation->getError('city');
        }
      }

      $output = array(
        'cityError' => $cityError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function barangay()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $barangayError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['barangay' => 'required']);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('barangay')) {
          $barangayError = $validation->getError('barangay');
        }
      }

      $output = array(
        'barangayError' => $barangayError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function street()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $streetError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['street' => 'required']);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('street')) {
          $streetError = $validation->getError('street');
        }
      }

      $output = array(
        'streetError' => $streetError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function prcLicense()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $prcLicenseError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'prcLicense' => [
          'rules' => 'required',
          'label' => 'PRC license no.'
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('prcLicense')) {
          $prcLicenseError = $validation->getError('prcLicense');
        }
      }

      $output = array(
        'prcLicenseError' => $prcLicenseError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function prcId()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $prcIdError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'prcId' => [
          'rules' => 'is_image[prcId]|uploaded[prcId]',
          'errors' => [
            'is_image' => 'PRC ID is not a valid image file.',
            'uploaded' => 'PRC ID field is required'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('prcId')) {
          $prcIdError = $validation->getError('prcId');
        }
      }

      $output = array(
        'prcIdError' => $prcIdError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function signature()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $signatureError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'signature' => [
          'rules' => 'is_image[signature]|uploaded[signature]',
          'errors' => [
            'is_image' => 'Signature is not a valid image file.',
            'uploaded' => 'The signature field is required'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('signature')) {
          $signatureError = $validation->getError('signature');
        }
      }

      $output = array(
        'signatureError' => $signatureError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function specialty()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url']);
      $specialtyError = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate(['specialty' => [
        'rules' => 'required',
        'label' => 'specialty / practices'
      ]]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('specialty')) {
          $specialtyError = $validation->getError('specialty');
        }
      }

      $output = array(
        'specialtyError' => $specialtyError,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function login()
  {
    if ($this->request->getVar('action')) {
      helper(['form', 'url', 'text']);
      $errors = '';
      $error = 'no';
      $success = 'no';
      $message = '';
      $type = '';
      $status = '';

      $error = $this->validate([
        'password' => [
          'rules' => 'validateUser[email,password]',
          'errors' => [
            'validateUser' => 'Invalid credentials.'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        $errors = $validation->listErrors();
      } else {
        $success = 'yes';
        if ($this->request->getVar('action') == 'Add') {
          $userModel = new UserModel();

          $user = $userModel->where('email', $this->request->getVar('email'))->first();

          if ($user) {
            $type = $user['type'];
            $status = $user['status'];
          }

          if ($user['status'] == 'verified') {
            $this->setSessionMethod($user);
          }
        }
      }

      $output = array(
        'errors' => $errors,
        'error' => $error,
        'success' => $success,
        'message' => $message,
        'type' => $type,
        'status' => $status
      );

      echo json_encode($output);
    }
  }


  private function setSessionMethod($user)
  {
    $data = [
      'id' => $user['id'], 'firstName' => $user['firstName'], 'middleName' => $user['middleName'], 'lastName' => $user['lastName'], 'suffix' => $user['suffix'], 'birthday' => $user['birthday'],
      'gender' => $user['gender'], 'civilStatus' => $user['civilStatus'], 'bloodType' => $user['bloodType'], 'province' => $user['province'], 'city' => $user['city'], 'barangay' => $user['barangay'],
      'street' => $user['street'], 'mobile' => $user['mobile'], 'email' => $user['email'], 'status' => $user['status'], 'image' => $user['image'], 'type' => $user['type'],
      'created' => $user['created'], 'isLoggedIn' => true
    ];

    session()->set($data);

    return true;
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
      foreach ($doctors as $doctor) {
        $a .= '
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 animate__animated animate__fadeInUp">
          <div class="doctor-list">
              <div class="doctor-inner">
                  <img class="img-fluid" alt="" src="assets/img/users/' . $doctor['image'] . '">
                  <div class="doctor-details">
                      <div class="doctor-info">
                          <h4 class="doctor-name"><a href="doctor/' . $doctor['slug'] . '">Dr. ' . $doctor['firstName'] . ' ' . $doctor['lastName'] . ' </a></h4>
                          <p>
                              <span class="doctor-name">' . $doctor['specialty'] . '</span>
                          </p>
                      </div>
                      <ul class="social-list">
                          <li>
                              <a class="facebook" href="#"><i class="fa fa-twitter"></i></a>
                          </li>
                          <li>
                              <a class="twitter" href="#"><i class="fa fa-facebook"></i></a>
                          </li>
                          <li>
                              <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                          </li>
                          <li>
                              <a class="g-plus" href="#"><i class="fa fa-google-plus"></i></a>
                          </li>
                      </ul>
                      <div class="view-profie">
                          <a href="doctor/' . $doctor['slug'] . '">View Profile</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        ';
      }
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





  public function forgotpassword()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url', 'text']);
      $errors = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'email' => [
          'rules' => 'required|is_not_unique[users.email]',
          'label' => 'email address',
          'errors' => [
            'is_not_unique' => 'The email address does not exist in our database.'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->getError('email')) {
          $errors = $validation->getError('email');
        }
      } else {
        $email = new Email();
        $userModel = new UserModel();

        $users = $userModel->where('email', $this->request->getVar('email'))->first();
        $token = random_string('alnum', 8) . $users['id'];

        if ($email->forgotPassword($this->request->getVar('email'), $token, $users['firstName'])) {
          $success = 'yes';

          $userModel->set('token', $token)->where('email', $this->request->getVar('email'))->update();
        } else {
          $error = 'yes';
          $errors = 'There was an error with the server, please try again later.';
        }
      }

      $output = array(
        'errors' => $errors,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function changepassword()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url', 'text']);
      $errors = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'password' => 'required|min_length[8]',
        'confirm_password3' => [
          'rules' => 'matches[password]',
          'errors' => [
            'matches' => 'The password did not match'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->listErrors()) {
          $errors = $validation->listErrors();
        }
      } else {
        $success = 'yes';

        $userModel = new UserModel();

        $userModel->set('password', $this->request->getVar('password'))->set('token', '')->where('token', $this->request->getVar('token'))->update();
      }

      $output = array(
        'errors' => $errors,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }

  public function resendConfirmation()
  {
    if ($this->request->getMethod() == 'post') {
      helper(['form', 'url', 'text']);
      $errors = '';
      $error = 'no';
      $success = 'no';

      $error = $this->validate([
        'email' => [
          'rules' => 'required|is_not_unique[users.email]',
          'label' => 'email address',
          'errors' => [
            'is_not_unique' => 'The email address does not exist in our database.'
          ]
        ]
      ]);

      if (!$error) {
        $error = 'yes';
        $validation = \Config\Services::validation();
        if ($validation->listErrors()) {
          $errors = $validation->listErrors();
        }
      } else {
        $email = new Email();
        $userModel = new UserModel();

        $user = $userModel->where('email', $this->request->getVar('email'))->first();

        if ($user['token'] == '') {
          $error = 'yes';
          $errors = 'Account already verified.';
        } else {
          if ($email->verifyuser($this->request->getVar('email'), $user['token'])) {
            $success = 'yes';
          } else {
            $error = 'yes';
            $errors = 'There was an error with the server, please try again later.';
          }
        }
      }

      $output = array(
        'errors' => $errors,
        'error' => $error,
        'success' => $success,
      );

      echo json_encode($output);
    }
  }


  public function resend()
  {
    $errors = '';
    $error = 'no';
    $success = 'no';
    $email = new Email();

    if ($email->verifyuser(session()->get('email'), session()->get('token'))) {
      $success = 'yes';
    } else {
      $error = 'yes';
      $errors = 'There was an error with the server, please try again later.';
    }

    $output = array(
      'errors' => $errors,
      'error' => $error,
      'success' => $success,
    );

    echo json_encode($output);
  }
}
