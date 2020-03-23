<?php
class M_sms extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('smsgateway', $data);
    }

    public function tampil()
    {
        return $this->db->get_where('smsgateway')->result();
    }

    public function hapus_sms($id)
    {
        $this->db->where('sms_id', $id)->delete('smsgateway');
    }
}
