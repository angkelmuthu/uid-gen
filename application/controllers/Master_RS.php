<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_RS extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Master_RS_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'master_rs/m_rs_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Master_RS_model->json();
    }

    public function read($id)
    {
        $row = $this->Master_RS_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdrs' => $row->kdrs,
                'nm_rs' => $row->nm_rs,
                'singkatan' => $row->singkatan,
                'alamat' => $row->alamat,
                'tipers' => $row->tipers,
            );
            $this->template->load('template', 'master_rs/m_rs_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('master_rs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_rs/create_action'),
            'kdrs' => set_value('kdrs'),
            'nm_rs' => set_value('nm_rs'),
            'singkatan' => set_value('singkatan'),
            'alamat' => set_value('alamat'),
            'tipers' => set_value('tipers'),
        );
        $this->template->load('template', 'master_rs/m_rs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdrs' => $this->input->post('kdrs', TRUE),
                'nm_rs' => $this->input->post('nm_rs', TRUE),
                'singkatan' => $this->input->post('singkatan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tipers' => $this->input->post('tipers', TRUE),
            );

            $this->Master_RS_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('master_rs'));
        }
    }

    public function update($id)
    {
        $row = $this->Master_RS_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_rs/update_action'),
                'kdrs' => set_value('kdrs', $row->kdrs),
                'nm_rs' => set_value('nm_rs', $row->nm_rs),
                'singkatan' => set_value('singkatan', $row->singkatan),
                'alamat' => set_value('alamat', $row->alamat),
                'tipers' => set_value('tipers', $row->tipers),
            );
            $this->template->load('template', 'master_rs/m_rs_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('master_rs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdrs', TRUE));
        } else {
            $data = array(
                'nm_rs' => $this->input->post('nm_rs', TRUE),
                'singkatan' => $this->input->post('singkatan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tipers' => $this->input->post('tipers', TRUE),
            );

            $this->Master_RS_model->update($this->input->post('kdrs', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('master_rs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Master_RS_model->get_by_id($id);

        if ($row) {
            $this->Master_RS_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('master_rs'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('master_rs'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kdrs', 'kode rs', 'trim|required');
        $this->form_validation->set_rules('nm_rs', 'nm rs', 'trim|required');
        $this->form_validation->set_rules('singkatan', 'singkatan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('tipers', 'tipers', 'trim|required');

        $this->form_validation->set_rules('kdrs', 'kdrs', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_rs.xls";
        $judul = "m_rs";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nm Rs");
        xlsWriteLabel($tablehead, $kolomhead++, "Singkatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Tipers");

        foreach ($this->Master_RS_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_rs);
            xlsWriteLabel($tablebody, $kolombody++, $data->singkatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteNumber($tablebody, $kolombody++, $data->tipers);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_rs.doc");

        $data = array(
            'm_rs_data' => $this->Master_RS_model->get_all(),
            'start' => 0
        );

        $this->load->view('master_rs/m_rs_doc', $data);
    }
}

/* End of file Master_RS.php */
/* Location: ./application/controllers/Master_RS.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-03 19:26:46 */
/* http://harviacode.com */
