<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pendapatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_pendapatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_pendapatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_pendapatan/index/';
            $config['first_url'] = base_url() . 'index.php/t_pendapatan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_pendapatan_model->total_rows($q);
        $t_pendapatan = $this->T_pendapatan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_pendapatan_data' => $t_pendapatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','t_pendapatan/t_pendapatan_list', $data);
    }

    public function read($id)
    {
        $row = $this->T_pendapatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kdrs' => $row->kdrs,
		'cara_bayar' => $row->cara_bayar,
		'lunas' => $row->lunas,
		'hutang' => $row->hutang,
		'tgl' => $row->tgl,
		'sycn' => $row->sycn,
	    );
            $this->template->load('template','t_pendapatan/t_pendapatan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pendapatan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pendapatan/create_action'),
	    'id' => set_value('id'),
	    'kdrs' => set_value('kdrs'),
	    'cara_bayar' => set_value('cara_bayar'),
	    'lunas' => set_value('lunas'),
	    'hutang' => set_value('hutang'),
	    'tgl' => set_value('tgl'),
	    'sycn' => set_value('sycn'),
	);
        $this->template->load('template','t_pendapatan/t_pendapatan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kdrs' => $this->input->post('kdrs',TRUE),
		'cara_bayar' => $this->input->post('cara_bayar',TRUE),
		'lunas' => $this->input->post('lunas',TRUE),
		'hutang' => $this->input->post('hutang',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'sycn' => $this->input->post('sycn',TRUE),
	    );

            $this->T_pendapatan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_pendapatan'));
        }
    }

    public function update($id)
    {
        $row = $this->T_pendapatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pendapatan/update_action'),
		'id' => set_value('id', $row->id),
		'kdrs' => set_value('kdrs', $row->kdrs),
		'cara_bayar' => set_value('cara_bayar', $row->cara_bayar),
		'lunas' => set_value('lunas', $row->lunas),
		'hutang' => set_value('hutang', $row->hutang),
		'tgl' => set_value('tgl', $row->tgl),
		'sycn' => set_value('sycn', $row->sycn),
	    );
            $this->template->load('template','t_pendapatan/t_pendapatan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pendapatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kdrs' => $this->input->post('kdrs',TRUE),
		'cara_bayar' => $this->input->post('cara_bayar',TRUE),
		'lunas' => $this->input->post('lunas',TRUE),
		'hutang' => $this->input->post('hutang',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'sycn' => $this->input->post('sycn',TRUE),
	    );

            $this->T_pendapatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_pendapatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_pendapatan_model->get_by_id($id);

        if ($row) {
            $this->T_pendapatan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_pendapatan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pendapatan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kdrs', 'kdrs', 'trim|required');
	$this->form_validation->set_rules('cara_bayar', 'cara bayar', 'trim|required');
	$this->form_validation->set_rules('lunas', 'lunas', 'trim|required');
	$this->form_validation->set_rules('hutang', 'hutang', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('sycn', 'sycn', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_pendapatan.xls";
        $judul = "t_pendapatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Cara Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Lunas");
	xlsWriteLabel($tablehead, $kolomhead++, "Hutang");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Sycn");

	foreach ($this->T_pendapatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kdrs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cara_bayar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lunas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hutang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sycn);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_pendapatan.doc");

        $data = array(
            't_pendapatan_data' => $this->T_pendapatan_model->get_all(),
            'start' => 0
        );

        $this->load->view('t_pendapatan/t_pendapatan_doc',$data);
    }

}

/* End of file T_pendapatan.php */
/* Location: ./application/controllers/T_pendapatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-06 04:29:25 */
/* http://harviacode.com */