<?php 
class PostsController extends Controller{
	
	/**
	* Blog, liste les articles
	**/
	function index(){
		$perPage = 10; 
		$this->loadModel('Post');
		$condition = array('online' => 1,'type'=>'post'); 
		$d['posts'] = $this->Post->find(array(
			'conditions' => $condition,
			'fields'     => 'Post.id,Post.name,Post.slug,Post.created,Category.name as catname,Post.content,Category.slug as catslug',
			'order'      => 'created DESC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
			'join'       => array('categories as Category'=>'Category.id=Post.category_id')
		));
		$d['total'] = $this->Post->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'afficher les posts d'une catégorie
	**/
	function category($slug){
		$this->loadModel('Category'); 
		$category = $this->Category->findFirst(array(
			'conditions' => array('slug' => $slug),
			'fields'     => 'id,name'
		));
		if(empty($category)){
			$this->e404();
		}
		$perPage = 10; 
		$this->loadModel('Post');
		$condition = array('online' => 1,'type'=>'post','category_id' => $category->id); 
		$d['posts'] = $this->Post->find(array(
			'conditions' => $condition,
			'fields'     => 'Post.id,Post.name,Post.slug,Post.created,Category.name as catname,Post.content,Category.slug as catslug',
			'order'      => 'created DESC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
			'join'       => array('categories as Category'=>'Category.id=Post.category_id')
		));
		$d['total'] = $this->Post->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$d['title'] = 'Tous les articles "'.$category->name.'"'; 
		$this->set($d);
		// Le système est le même que la page index alors on rend la vue Index
		$this->render('index'); 
	}

	/**
	* Affiche un article en particulier
	**/
	function view($id,$slug){
		$this->loadModel('Post');
		$d['post']  = $this->Post->findFirst(array(
			'fields'	 => 'Post.id,Post.content,Post.name,Post.slug,Category.name as catname,Category.slug as catslug',
			'conditions' => array('Post.online' => 1,'Post.id'=>$id,'Post.type'=>'post'),
			'join'		 => array('categories as Category'=>'Category.id=Post.category_id')
		)); 
		if(empty($d['post'])){
			$this->e404('Page introuvable'); 
		}
		if($slug != $d['post']->slug){
			$this->redirect("posts/view/id:$id/slug:".$d['post']->slug,301);
		}
		$this->set($d);
	}
	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Post');
		$condition = array('type'=>'post'); 
		$d['posts'] = $this->Post->find(array(
			'fields'     => 'Post.id,Post.name,Post.online,Category.name as catname,Category.slug as catslug',
			'order' 	 => 'created DESC',
			'conditions' => $condition,
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
			'join'		 => array('categories as Category'=>'Category.id=Post.category_id')
		));
		$d['total'] = $this->Post->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Post'); 
		if($id === null){
			$post = $this->Post->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Post->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Post->id;
			} 
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Post->validates($this->request->data)){
				$this->request->data->type = 'post';

				$this->Post->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été modifié'); 
				$this->redirect('admin/posts/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Post->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		// On veut un sélecteur de catégorie donc on récup la liste des catégories
		$this->loadModel('Category');
		$d['categories'] = $this->Category->findList(); 
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Post');
		$this->Post->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/posts/index'); 
	}

	/**
	* Permet de lister les contenus
	**/
	function admin_tinymce(){
		$this->loadModel('Post');
		$this->layout = 'modal'; 
		$d['posts'] = $this->Post->find();
		$this->set($d);
	}


}