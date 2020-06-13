
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Modadmin');
        $this->load->model('Moddokter');
        $this->load->library('form_validation');
    }
    //CRUD DOKTER
    public function index()
    {

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Data Dokter',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Moddokter->get_dokter()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_dokter', $data);
    }

    //EDIT DOKTER
    public function edit_dokter()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Edit Data Dokter',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'id' => $id,
            'items' => $this->Moddokter->edit_dokter($id)

        );
        $this->form_validation->set_rules('kode_dokter', 'Kode dokter', 'required|trim|min_length[6]|unique', [
            'min_length' => 'kode dokter to shoort!',
            'unique' => 'kode dokter sudah digunakan'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/footer');
            $this->load->view('dokter/edit_dokter', $data);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('name');
            $email = $this->input->post('email');


            $this->db->set('id', $id);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Your profile has been updated!</center></div>');
            redirect('admin/tampil_user');
        }
    }
    //UPDATE USER
    public function update_dokter()
    {
        $id = $this->input->post('id');
        $data = array(
            'kode_dokter' => $this->input->post('kode_dokter'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'poli' => $this->input->post('poli')
        );
        $this->Moddokter->update_dokter($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter has been updated! </center></div>');
        redirect('dokter');
    }

    //TAMBAH DOKTER
    public function tambah_dokter()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'tambah Data Dokter',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'id' => $id

        );
        $this->form_validation->set_rules('kode_dokter', 'Kode dokter', 'required|trim|min_length[6]|unique', [
            'min_length' => 'kode dokter to shoort!',
            'unique' => 'kode dokter sudah digunakan'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/footer');
            $this->load->view('dokter/tambah_dokter', $data);
        } else {
            $data = array(
                'kode_dokter' => $this->input->post('kode_dokter'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'poli' => $this->input->post('poli')
            );

            $this->db->insert('data_dokter', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter berhasil ditambah!</center></div>');
            redirect('dokter');
        }
    }
    // public function insert_dokter()
    // {
    //     $data = array(
    //         'kode_dokter' => $this->input->post('kode_dokter'),
    //         'nama' => $this->input->post('nama'),
    //         'jk' => $this->input->post('jk'),
    //         'poli' => $this->input->post('poli')
    //     );

    //     $this->db->insert('data_dokter', $data);

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter berhasil ditambah!</center></div>');
    //     redirect('dokter');
    // }

    //HAPUS DATA Dokter
    public function hapus_dokter()
    {
        $id = $this->input->get('id');

        $this->Moddokter->hapus_dokter($id);

        redirect('dokter', 'refresh');
    }
}
