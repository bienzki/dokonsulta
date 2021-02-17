<?php

namespace App\Controllers;

use App\Models\ProvinceModel;
use App\Models\CityModel;
use App\Models\BarangayModel;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$userModel = new UserModel();
		$doctors = $userModel->where('type', 'doctor')->where('status', 'verified')->join('doctor', 'users.id = doctor.doctorId')->groupBy('specialty')->findAll();
		$data = [
			'metaTitle' => 'Home - DoKonsulta',
			'doctors' => $doctors
		];

		helper('form');

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name' => 'required|alpha_space|min_length[2]|max_length[30]',
				'email' => 'required|valid_email',
				'subject' => 'required',
				'phone' => 'required|numeric|exact_length[11]',
				'message' => 'required'
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				// $contact = new ContactModel();

				// $newData = [
				// 	'name' => $this->request->getVar('name'),
				// 	'email' => $this->request->getVar('email'),
				// 	'subject' => $this->request->getVar('subject'),
				// 	'phone' => $this->request->getVar('phone'),
				// 	'message' => $this->request->getVar('message'),
				// ];

				// $contact->save($newData);
				// $session = session();
				// $session->setFlashdata('success', 'Successful Order!');
				// return redirect()->to('/contact');
			}
		}


		echo view('templates/header', $data);
		echo view('index');
		echo view('templates/footer');
	}

	public function doctors()
	{
		$userModel = new UserModel();
		$doctors = $userModel->where('type', 'doctor')->where('status', 'verified')->join('doctor', 'users.id = doctor.doctorId')->findAll();

		$cities = $userModel->where('type', 'doctor')->where('status', 'verified')->groupBy('city')->findAll();

		$data = [
			'metaTitle' => 'Doctors - DoKonsulta',
			'doctors' => $doctors,
			'cities' => $cities
		];
		$data['specialties'] = [
			'Adolescent Medicine', 'Adult Rheumatology', 'Allergy and Immunology', 'Anaesthesiology', 'Anesthesia', 'Body Interventional Radiology', 'Cardiology', 'Cardiothoracic Surgery', 'Child and Adolescent Psychiatry and Psychotherapy', 'Clinical Neurophysiology', 'Counseling Psychology', 'Counseling Psychology and Psychotherapy', 'Degenerative and Oncologic Spine Surgery', 'Dentistry', 'Dermato-Venereology', 'Dermatology', 'Emergency Medicine', 'Endocrinology', 'Family and Community Medicine Specialist', 'Family Medicine', 'Gastroenterology', 'General Orthopaedics', 'General Paediatrics', 'General Practice', 'General Surgery', 'Geriatrics', 'Gynecologic Oncology', 'Hand', 'Shoulder', 'and Upper Extremities Specialist', 'Health Informatics', 'Hospice and Palliative Medicine', 'Infectious Diseases', 'Infertility', 'Internal Medicine', 'Interventional Neuroradiology', 'Interventional Radiology', 'Microbiology', 'Minimally Invasive Surgery', 'Neonatology', 'Nephrology', 'Neurology', 'Neuroradiology', 'Neurosurgery', 'Nuclear Medicine', 'OB-GYN Laparoscopy', 'OB-GYN Ultrasound', 'OBGYN Laparoscopy and Hysteroscopy.', 'Obstetric and Gynecology Sonologist', 'Obstetrics and Gynaecology', 'Occupational Medicine', 'Ophthalmology', 'Oral and Maxillofacial Surgery', 'Otolaryngology', 'Otolaryngology - Head and Neck Surgery', 'Otolaryngology Head &amp; Neck Surgery', 'Otorhinolaryngology', 'Paediatric Allergology', 'Paediatric Endocrinology and Diabetes', 'Paediatric Gastroenterology  Hepatology and Nutrition', 'Paediatric Haematology and Oncology', 'Paediatric Infectious Diseases', 'Paediatric Nephrology', 'Paediatric Respiratory Medicine', 'Paediatric Rheumatology', 'Paediatric Surgery', 'Pathology', 'PEDIATRIC NEUROLOGY', 'Physical Medicine and Rehabilitation', 'Plastic and Reconstructive', 'Plastic Reconstructive and Aesthetic Surgery', 'Podiatric Medicine', 'Psychiatry', 'Psychological Testing and Assessment', 'Public Health', 'Pulmonology', 'Radiology', 'Radiotherapy', 'Rehabilitation Medicine', 'Spine Surgery', 'Sports Medicine', 'Urogynecology', 'Urology', 'Vascular Medicine', 'Vascular Surgery'
		];

		echo view('templates/header', $data);
		echo view('doctors');
		echo view('templates/footer');
	}

	public function doctor($slug)
	{
		$userModel = new UserModel();
		$doctors = $userModel->where('slug', $slug)->join('doctor', 'users.id = doctor.doctorId')->first();
		$data = [
			'metaTitle' => 'Doctor Details - DoKonsulta',
			'doctors' => $doctors
		];

		if (!$doctors) {
			return view('errors/html/error_404');
		} else {
			echo view('templates/header', $data);
			echo view('doctor');
			echo view('templates/footer');
		}
	}


	public function login()
	{
		$data = [
			'metaTitle' => 'Login - DoKonsulta'
		];

		echo view('templates/header', $data);
		echo view('login');
		echo view('templates/footer');
	}

	public function signup()
	{
		$provinceModel = new ProvinceModel();
		$provinces = $provinceModel->orderBy('name', 'ASC')->findAll();

		$data = [
			'metaTitle' => ' Patient\'s Signup - DoKonsulta',
			'provinces' => $provinces
		];
		$data['genders'] = [
			'Male',
			'Female',
		];
		$data['specialties'] = [
			'Adolescent Medicine', 'Adult Rheumatology', 'Allergy and Immunology', 'Anaesthesiology', 'Anesthesia', 'Body Interventional Radiology', 'Cardiology', 'Cardiothoracic Surgery', 'Child and Adolescent Psychiatry and Psychotherapy', 'Clinical Neurophysiology', 'Counseling Psychology', 'Counseling Psychology and Psychotherapy', 'Degenerative and Oncologic Spine Surgery', 'Dentistry', 'Dermato-Venereology', 'Dermatology', 'Emergency Medicine', 'Endocrinology', 'Family and Community Medicine Specialist', 'Family Medicine', 'Gastroenterology', 'General Orthopaedics', 'General Paediatrics', 'General Practice', 'General Surgery', 'Geriatrics', 'Gynecologic Oncology', 'Hand', 'Shoulder', 'and Upper Extremities Specialist', 'Health Informatics', 'Hospice and Palliative Medicine', 'Infectious Diseases', 'Infertility', 'Internal Medicine', 'Interventional Neuroradiology', 'Interventional Radiology', 'Microbiology', 'Minimally Invasive Surgery', 'Neonatology', 'Nephrology', 'Neurology', 'Neuroradiology', 'Neurosurgery', 'Nuclear Medicine', 'OB-GYN Laparoscopy', 'OB-GYN Ultrasound', 'OBGYN Laparoscopy and Hysteroscopy.', 'Obstetric and Gynecology Sonologist', 'Obstetrics and Gynaecology', 'Occupational Medicine', 'Ophthalmology', 'Oral and Maxillofacial Surgery', 'Otolaryngology', 'Otolaryngology - Head and Neck Surgery', 'Otolaryngology Head &amp; Neck Surgery', 'Otorhinolaryngology', 'Paediatric Allergology', 'Paediatric Endocrinology and Diabetes', 'Paediatric Gastroenterology  Hepatology and Nutrition', 'Paediatric Haematology and Oncology', 'Paediatric Infectious Diseases', 'Paediatric Nephrology', 'Paediatric Respiratory Medicine', 'Paediatric Rheumatology', 'Paediatric Surgery', 'Pathology', 'PEDIATRIC NEUROLOGY', 'Physical Medicine and Rehabilitation', 'Plastic and Reconstructive', 'Plastic Reconstructive and Aesthetic Surgery', 'Podiatric Medicine', 'Psychiatry', 'Psychological Testing and Assessment', 'Public Health', 'Pulmonology', 'Radiology', 'Radiotherapy', 'Rehabilitation Medicine', 'Spine Surgery', 'Sports Medicine', 'Urogynecology', 'Urology', 'Vascular Medicine', 'Vascular Surgery'
		];

		echo view('templates/header', $data);
		echo view('signup');
		echo view('templates/footer');
	}

	public function patient()
	{
		$provinceModel = new ProvinceModel();
		$provinces = $provinceModel->orderBy('name', 'ASC')->findAll();
		$data = [
			'metaTitle' => 'Doctor\'s Signup - DoKonsulta',
			'provinces' => $provinces
		];
		$data['genders'] = ['Male', 'Female'];
		$data['civilstatuses'] = ['Single', 'Married', 'Widowed'];
		$data['bloodtypes'] = ['A+', 'A-', 'AB+', 'AB-', 'B+', 'B-', 'O+', 'O-'];

		echo view('templates/header', $data);
		echo view('patient');
		echo view('templates/footer');
	}

	public function city()
	{
		if ($this->request->isAJAX()) {
			$provinceId = service('request')->getPost('provinceId');
			$cityModel = new CityModel();
			$cities = $cityModel->where('provinceId', $provinceId)->orderBy('name', 'ASC')->findAll();
			echo json_encode($cities);
		} else {
			return view('errors/html/error_404');
		}
	}

	public function barangay()
	{
		if ($this->request->isAJAX()) {
			$cityId = service('request')->getPost('cityId');
			$barangayModel = new BarangayModel();
			$barandgays = $barangayModel->where('cityId', $cityId)->orderBy('name', 'ASC')->findAll();
			echo json_encode($barandgays);
		} else {
			return view('errors/html/error_404');
		}
	}

	public function verify($token)
	{
		$userModel = new UserModel();

		$users = $userModel->where('token', $token)->first();

		if (!$users) {
			return view('errors/html/error_404');
		} else {
			$userModel->set('status', 'verified')->set('token', '')->where('id', $users['id'])->update();
			$data = [
				'metaTitle' => 'Account Verification - DoKonsulta',
				'firstName' => $users['firstName']
			];

			return view('verify', $data);
		}
	}

	public function forgotpassword($token)
	{
		$userModel = new UserModel();

		$users = $userModel->where('token', $token)->first();

		if (!$users) {
			return view('errors/html/error_404');
		} else {
			$data = [
				'metaTitle' => 'Account Verification - DoKonsulta',
				'firstName' => $users['firstName'],
				'token' => $token
			];

			echo view('templates/header', $data);
			echo view('forgotpassword');
			echo view('templates/footer');
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


	//--------------------------------------------------------------------

}
