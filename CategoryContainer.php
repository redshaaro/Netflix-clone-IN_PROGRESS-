<?php
class CategoryContainer {

    private $con, $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }
	public function showAllCategories(){
		
		$query=$this->con->prepare("SELECT * FROM categories");
		
		$query->execute();
		
		$html="<div class='previewCategories'>'";
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			
			$html .= $this->getCategoryhtml($row,null,true,true);
		}
		return $html . "</div>";
	}
	
	public function showCategory($catgoryId,$title=null){
		$query=$this->con->prepare("SELECT * FROM categories WHERE id=:id");
		$query ->bindValue(":id",$catgoryId);
		
		$query->execute();
		
		$html="<div class='previewCategories noScroll'>";
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			
			$html .= $this->getCategoryhtml($row,$title,true,true);
		}
		return $html . "</div>";
		
		
		
	}
	
	
	private function getCategoryHtml($sqlData,$title,$tvShows,$movies){
		$catgoryId=$sqlData["id"];
		$title= $title==null ? $sqlData["name"]:$title;
		if($tvShows && $movies){
		  $entities=EntityProvider::getEntities($this->con, $catgoryId,30 );	
			
			
			
		}
		else if($tvShows){
			
			
			
		}
		else{
			
			
			
			
		}
		if(sizeof($entities)==0){
			
			
			return;
			
		}
		$entitiesHtml= "";
		$previewProvider = new PreviewProvider($this->con,$this->username);
		
		foreach($entities as $entity){
		 $entitiesHtml .= $previewProvider->creatEntityPreviewSquare($entity);
		}
		
	return "<div class='category'> 
	   <a href='category.php?id=$catgoryId'> 
	   <h3>$title</h3>
	   </a>
	   
	   <div class='entities'>
	   $entitiesHtml
        </div>	   
	   </div>";
		
		
		
		
		
	}
}
	?>