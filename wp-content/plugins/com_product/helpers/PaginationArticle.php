<?php
class PaginationArticle{
	
	private $totalItems;					// Tổng số phần tử
	private $totalItemsPerPage		= 1;	// Tổng số phần tử xuất hiện trên một trang
	private $pageRange				= 5;	// Số trang xuất hiện
	private $totalPage;						// Tổng số trang
	private $currentPage			= 1;	// Trang hiện tại
	
	public function __construct($pagination){
		$this->totalItems			= $pagination["totalItems"] ;
		$this->totalItemsPerPage	= $pagination['totalItemsPerPage'];
		
		if($pagination['pageRange'] %2 == 0) $pagination['pageRange'] = $pagination['pageRange'] + 1;
		
		$this->pageRange			= $pagination['pageRange'];
		$this->currentPage			= $pagination['currentPage'];
		$this->totalPage			= ceil($this->totalItems/$pagination['totalItemsPerPage']);
	}
	public function showPagination(){		
		$paginationHTML = '';
		if($this->totalPage > 1){
			$start 	= '<li ><span class="current"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span></li>';
			$prev 	= '<li ><span class="current"><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>';
			if($this->currentPage > 1){
				$start 	= '<li ><a href="?trang=1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
				$prev 	= '<li ><a href="?trang='.($this->currentPage-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			}
		
			$next 	= '<li ><span class="current"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>';
			$end 	= '<li ><span class="current"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>';
			if($this->currentPage < $this->totalPage){
				$next 	= '<li ><a href="?trang='.($this->currentPage+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
				$end 	= '<li ><a href="?trang='.$this->totalPage.'" ><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
			}
		
			if($this->pageRange < $this->totalPage){
				if($this->currentPage == 1){
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				}else if($this->currentPage == $this->totalPage){
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				}else{
					$startPage		= $this->currentPage - ($this->pageRange-1)/2;
					$endPage		= $this->currentPage + ($this->pageRange-1)/2;
		
					if($startPage < 1){
						$endPage	= $endPage + 1;
						$startPage = 1;
					}
		
					if($endPage > $this->totalPage){
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			}else{
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}

			$listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->currentPage) {
					$listPages .= '<li><span class="current">'.$i.'</span></li>';
				}else{
					$listPages .= '<li><a href="?trang='.$i.'">'.$i.'</a></li>';
				}
			}
			$listPages .= '';
			$endPagination	= '<li >Page '.$this->currentPage.' of '.$this->totalPage.'</li>';
			$paginationHTML = '<ul class="page-numbers">' . $start . $prev . $listPages . $next . $end  . '</ul>';
		}
		return $paginationHTML;
	}
}