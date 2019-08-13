<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kunjungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kunjungan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_kunjungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_kunjungan/index/';
            $config['first_url'] = base_url() . 'index.php/t_kunjungan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_kunjungan_model->total_rows($q);
        $t_kunjungan = $this->T_kunjungan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_kunjungan_data' => $t_kunjungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 't_kunjungan/t_kunjungan_list', $data);
    }

    public function read($id)
    {
        $row = $this->T_kunjungan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idkunjungan' => $row->idkunjungan,
                'kdrs' => $row->kdrs,
                'tgl' => $row->tgl,
                'cara_bayar' => $row->cara_bayar,
                'rj' => $row->rj,
                'ri' => $row->ri,
                'igd' => $row->igd,
                'sync' => $row->sync,
            );
            $this->template->load('template', 't_kunjungan/t_kunjungan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_kunjungan'));
        }
    }

    public function dash()
    {
        $data = $this->T_kunjungan_model->get_all_dash();
        $dash = array(
            'k_dash' => $data,
        );
        $this->template->load('template', 't_kunjungan/t_kunjungan_dash', $dash);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_kunjungan/create_action'),
            'idkunjungan' => set_value('idkunjungan'),
            'kdrs' => set_value('kdrs'),
            'tgl' => set_value('tgl'),
            'cara_bayar' => set_value('cara_bayar'),
            'rj' => set_value('rj'),
            'ri' => set_value('ri'),
            'igd' => set_value('igd'),
            'sync' => set_value('sync'),
        );
        $this->template->load('template', 't_kunjungan/t_kunjungan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdrs' => $this->input->post('kdrs', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
                'cara_bayar' => $this->input->post('cara_bayar', TRUE),
                'rj' => $this->input->post('rj', TRUE),
                'ri' => $this->input->post('ri', TRUE),
                'igd' => $this->input->post('igd', TRUE),
                'sync' => $this->input->post('sync', TRUE),
            );

            $this->T_kunjungan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_kunjungan'));
        }
    }

    public function update($id)
    {
        $row = $this->T_kunjungan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kunjungan/update_action'),
                'idkunjungan' => set_value('idkunjungan', $row->idkunjungan),
                'kdrs' => set_value('kdrs', $row->kdrs),
                'tgl' => set_value('tgl', $row->tgl),
                'cara_bayar' => set_value('cara_bayar', $row->cara_bayar),
                'rj' => set_value('rj', $row->rj),
                'ri' => set_value('ri', $row->ri),
                'igd' => set_value('igd', $row->igd),
                'sync' => set_value('sync', $row->sync),
            );
            $this->template->load('template', 't_kunjungan/t_kunjungan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_kunjungan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkunjungan', TRUE));
        } else {
            $data = array(
                'kdrs' => $this->input->post('kdrs', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
                'cara_bayar' => $this->input->post('cara_bayar', TRUE),
                'rj' => $this->input->post('rj', TRUE),
                'ri' => $this->input->post('ri', TRUE),
                'igd' => $this->input->post('igd', TRUE),
                'sync' => $this->input->post('sync', TRUE),
            );

            $this->T_kunjungan_model->update($this->input->post('idkunjungan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_kunjungan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_kunjungan_model->get_by_id($id);

        if ($row) {
            $this->T_kunjungan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_kunjungan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_kunjungan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kdrs', 'kdrs', 'trim|required');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('cara_bayar', 'cara bayar', 'trim|required');
        $this->form_validation->set_rules('rj', 'rj', 'trim|required');
        $this->form_validation->set_rules('ri', 'ri', 'trim|required');
        $this->form_validation->set_rules('igd', 'igd', 'trim|required');
        // $this->form_validation->set_rules('sync', 'sync', 'trim|required');

        $this->form_validation->set_rules('idkunjungan', 'idkunjungan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kunjungan.xls";
        $judul = "t_kunjungan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Kdrs");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
        xlsWriteLabel($tablehead, $kolomhead++, "Cara Bayar");
        xlsWriteLabel($tablehead, $kolomhead++, "Rj");
        xlsWriteLabel($tablehead, $kolomhead++, "Ri");
        xlsWriteLabel($tablehead, $kolomhead++, "Igd");
        xlsWriteLabel($tablehead, $kolomhead++, "Sync");

        foreach ($this->T_kunjungan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdrs);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
            xlsWriteLabel($tablebody, $kolombody++, $data->cara_bayar);
            xlsWriteNumber($tablebody, $kolombody++, $data->rj);
            xlsWriteNumber($tablebody, $kolombody++, $data->ri);
            xlsWriteNumber($tablebody, $kolombody++, $data->igd);
            xlsWriteLabel($tablebody, $kolombody++, $data->sync);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_kunjungan.doc");

        $data = array(
            't_kunjungan_data' => $this->T_kunjungan_model->get_all(),
            'start' => 0
        );

        $this->load->view('t_kunjungan/t_kunjungan_doc', $data);
    }
}

/* End of file T_kunjungan.php */
/* Location: ./application/controllers/T_kunjungan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-05 18:01:12 */
/* http://harviacode.com */
