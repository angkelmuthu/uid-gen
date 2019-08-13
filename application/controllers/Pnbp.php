<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pnbp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pnbp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pnbp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/pnbp/index/';
            $config['first_url'] = base_url() . 'index.php/pnbp/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Pnbp_model->total_rows($q);
        $pnbp = $this->Pnbp_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pnbp_data' => $pnbp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pnbp/m_pnbp_list', $data);
    }

    public function read($id)
    {
        $row = $this->Pnbp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'nik' => $row->nik,
		'nama_polres' => $row->nama_polres,
		'kota' => $row->kota,
		'polda' => $row->polda,
		'provinsi' => $row->provinsi,
		'samsat' => $row->samsat,
		'loket' => $row->loket,
		'tanggal' => $row->tanggal,
		'surat' => $row->surat,
		'transaksi' => $row->transaksi,
		'jenis' => $row->jenis,
		'harga' => $row->harga,
	    );
            $this->template->load('template','pnbp/m_pnbp_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pnbp'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pnbp/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'nik' => set_value('nik'),
	    'nama_polres' => set_value('nama_polres'),
	    'kota' => set_value('kota'),
	    'polda' => set_value('polda'),
	    'provinsi' => set_value('provinsi'),
	    'samsat' => set_value('samsat'),
	    'loket' => set_value('loket'),
	    'tanggal' => set_value('tanggal'),
	    'surat' => set_value('surat'),
	    'transaksi' => set_value('transaksi'),
	    'jenis' => set_value('jenis'),
	    'harga' => set_value('harga'),
	);
        $this->template->load('template','pnbp/m_pnbp_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama_polres' => $this->input->post('nama_polres',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'polda' => $this->input->post('polda',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'samsat' => $this->input->post('samsat',TRUE),
		'loket' => $this->input->post('loket',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'surat' => $this->input->post('surat',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Pnbp_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('pnbp'));
        }
    }

    public function update($id)
    {
        $row = $this->Pnbp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pnbp/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'nik' => set_value('nik', $row->nik),
		'nama_polres' => set_value('nama_polres', $row->nama_polres),
		'kota' => set_value('kota', $row->kota),
		'polda' => set_value('polda', $row->polda),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'samsat' => set_value('samsat', $row->samsat),
		'loket' => set_value('loket', $row->loket),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'surat' => set_value('surat', $row->surat),
		'transaksi' => set_value('transaksi', $row->transaksi),
		'jenis' => set_value('jenis', $row->jenis),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->template->load('template','pnbp/m_pnbp_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pnbp'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama_polres' => $this->input->post('nama_polres',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'polda' => $this->input->post('polda',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'samsat' => $this->input->post('samsat',TRUE),
		'loket' => $this->input->post('loket',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'surat' => $this->input->post('surat',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Pnbp_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('pnbp'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pnbp_model->get_by_id($id);

        if ($row) {
            $this->Pnbp_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('pnbp'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pnbp'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_polres', 'nama polres', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('polda', 'polda', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('samsat', 'samsat', 'trim|required');
	$this->form_validation->set_rules('loket', 'loket', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('surat', 'surat', 'trim|required');
	$this->form_validation->set_rules('transaksi', 'transaksi', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_pnbp.xls";
        $judul = "m_pnbp";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Polres");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Polda");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Samsat");
	xlsWriteLabel($tablehead, $kolomhead++, "Loket");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");

	foreach ($this->Pnbp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_polres);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->polda);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->samsat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->loket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pnbp.php */
/* Location: ./application/controllers/Pnbp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-08 18:39:09 */
/* http://harviacode.com */