<?php 
	//load file model
	include "models/InformationsModel.php";
	class InformationsController extends Controller{
		//ke thua class InformationsModel
		use InformationsModel;
		//liet ke so ban ghi
		public function index(){
			//quy dinh so ban ghi mot trang
			$recordPerPage = 20;
			//tinh so trang
			//ham ceil la ham lay tran. VD: ceil(2.1) = 3
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			//lay danh sach cac ban ghi co phan trang
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("InformationsView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"]: 0;
			$record = $this->modelGetRecord($id);
			//goi view, truyen du lieu ra view
			$this->loadView("InformationsDetailView.php",["record"=>$record]);
		}		
	}
 ?>