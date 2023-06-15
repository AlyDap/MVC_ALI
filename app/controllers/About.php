<?php 
class About extends Controller{

    public function index($nama='Muhamamd Ferdynan Ali Syahbana', $pekerjaan='Youtuber'){
        // $nama ;
        // $pekerjaan;
        // $br='<br>';
        // echo 'Nama saya '.$nama.$br.'Saya suka '.$pekerjaan;

        $data['nama']=$nama;
        $data['pekerjaan']=$pekerjaan;
        $data['title']='about index';
        $this->view('templates/header',$data);
        $this->view('about/index',$data);
        $this->view('templates/footer');

    }
    public function page(){
        // echo 'About/page';
        $data['title']='about page';
        $this->view('templates/header',$data);
        $this->view('about/page');
        $this->view('templates/footer');

    }
}
