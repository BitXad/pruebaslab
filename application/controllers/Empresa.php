<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Empresa extends CI_Controller{
    //private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Empresa_model');
        $this->load->model('Usuario_model');
       // $this->load->model('Proveedor_model');
//        if ($this->session->userdata('logged_in')) {
//            $this->session_data = $this->session->userdata('logged_in');
//        }else {
//            redirect('', 'refresh');
//        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
//        $rolusuario = $this->session_data['rol'];
//        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
//            return true;
//        }else{
//            $data['_view'] = 'login/mensajeacceso';
//            $this->load->view('layouts/main',$data);
//        }
        
        return true;
    }
    /*
     * Listing of empresa
     */
    function index()
    {
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/         
        
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        if($this->acceso(121)){
            
            $data['page_title'] = "Empresa";
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('empresa/index?');
        $config['total_rows'] = $this->Empresa_model->get_all_empresa_count();
        $this->pagination->initialize($config);
            
        $data['empresa'] = $this->Empresa_model->get_all_empresa($params);
        
        $data['_view'] = 'empresa/index';
        $this->load->view('layouts/main',$data);
        }

        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/         
        
    }

    /*
     * Adding a new empresa
     */
    function add()
    {
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        if($this->acceso(121)){
            $data['page_title'] = "Empresa";
        $this->load->library('form_validation');

        $this->form_validation->set_rules('empresa_nombre','Empresa Nombre','required');

        if($this->form_validation->run())     
        {
             /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['empresa_imagen']['name'])){
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/empresas/';
                        $img_full_path = $config['upload_path'];

                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 0;
                        $config['max_width'] = 4900;
                        $config['max_height'] = 4900;
                        
                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('empresa_imagen');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/empresas/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                        }
                        /* ********************F I N  para resize***************************** */
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/empresas/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/empresas/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 50;
                        $confi['height'] = 50;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }
            /* *********************FIN imagen***************************** */
            $params = array(
                    'empresa_nombre' => $this->input->post('empresa_nombre'),
                    'empresa_eslogan' => $this->input->post('empresa_eslogan'),
                    'empresa_direccion' => $this->input->post('empresa_direccion'),
                    'empresa_telefono' => $this->input->post('empresa_telefono'),
                    'empresa_imagen' => $foto,
                    'empresa_zona' => $this->input->post('empresa_zona'),
                    'empresa_ubicacion' => $this->input->post('empresa_ubicacion'),
                    'empresa_departamento' => $this->input->post('empresa_departamento'),
                    'empresa_propietario' => $this->input->post('empresa_propietario'),
                    'empresa_codigo' => $this->input->post('empresa_codigo'),
                    'empresa_email' => $this->input->post('empresa_email'),
                    'empresa_profesion' => $this->input->post('empresa_profesion'),
                    'empresa_cargo' => $this->input->post('empresa_cargo'),
                    'empresa_latitud' => $this->input->post('empresa_latitud'),
                    'empresa_longitud' => $this->input->post('empresa_longitud'),
            );
            
            $empresa_id = $this->Empresa_model->add_empresa($params);
            redirect('empresa/index');
        }
        else
        {
            $this->load->model('Parametro_model');
            $data['parametro'] = $this->Parametro_model->get_parametro(1);
            
            $data['_view'] = 'empresa/add';
            $this->load->view('layouts/main',$data);
        }
        }
    }

    /*
     * Editing a empresa
     */
    function edit($empresa_id)
    {
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        if($this->acceso(121)){
            
            $data['page_title'] = "Empresa";
        // check if the empresa exists before trying to edit it
        
        $data['empresas'] = $this->Empresa_model->get_this_empresa($empresa_id);
        
        if(isset($data['empresas']['empresa_id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('empresa_nombre','Empresa Nombre','required');

            if($this->form_validation->run())     
            {
                 /* *********************INICIO imagen***************************** */
                $foto="";
                    $foto1= $this->input->post('empresa_imagen1');
                if (!empty($_FILES['empresa_imagen']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/empresas/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 4900;
                    $config['max_height'] = 4900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('empresa_imagen');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/empresas/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    $base_url = explode('/', base_url());
                    //$directorio = base_url().'resources/imagenes/';
                    //$directorio = FCPATH.'resources\images\empresas\\';
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/empresas/';
                    //$directorio = $_SERVER['DOCUMENT_ROOT'].'/ximpleman_web/resources/images/empresas/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          //$mimagenthumb = str_replace(".", "_thumb.", $foto1);
                          $mimagenthumb = "thumb_".$foto1;
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/empresas/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/empresas/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 50;
                    $confi['height'] = 50;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }else{
                    $foto = $foto1;
                }
            /* *********************FIN imagen***************************** */
                $params = array(
                        'empresa_nombre' => $this->input->post('empresa_nombre'),
                        'empresa_eslogan' => $this->input->post('empresa_eslogan'),
                        'empresa_direccion' => $this->input->post('empresa_direccion'),
                        'empresa_telefono' => $this->input->post('empresa_telefono'),
                        'empresa_imagen' => $foto,
                        'empresa_zona' => $this->input->post('empresa_zona'),
                        'empresa_ubicacion' => $this->input->post('empresa_ubicacion'),
                        'empresa_departamento' => $this->input->post('empresa_departamento'),
                        'empresa_propietario' => $this->input->post('empresa_propietario'),
                        'empresa_codigo' => $this->input->post('empresa_codigo'),
                        'empresa_email' => $this->input->post('empresa_email'),
                        'empresa_profesion' => $this->input->post('empresa_profesion'),
                        'empresa_cargo' => $this->input->post('empresa_cargo'),
                        'empresa_latitud' => $this->input->post('empresa_latitud'),
                        'empresa_longitud' => $this->input->post('empresa_longitud'),
                );

                $this->Empresa_model->update_empresa($empresa_id,$params);            
                redirect('empresa/index');
            }
            else
            {
                $this->load->model('Parametro_model');
                $data['parametro'] = $this->Parametro_model->get_parametro(1);
                
                $data['_view'] = 'empresa/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The empresa you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting empresa
     */
    function remove($empresa_id)
    {
        if($this->acceso(121)){
        $empresa = $this->Empresa_model->get_this_empresa($empresa_id);

        // check if the empresa exists before trying to delete it
        if(isset($empresa['empresa_id']))
        {
            $this->Empresa_model->delete_empresa($empresa_id);
            redirect('empresa/index');
        }
        else
            show_error('The empresa you are trying to delete does not exist.');
        }
    }

    /*add by fito*/

    public function upgrade($codigo,$token)
    {
        if($token=='IongAszywDCxmGsZWKrHrhQdEnvtFESX'){
            $data = array(
                'empresa_codigo' => $codigo
            );

            $this->Empresa_model->update_empresa(1, $data);

            echo '1';
        } else {
            echo 'error';
        }
    }
}
