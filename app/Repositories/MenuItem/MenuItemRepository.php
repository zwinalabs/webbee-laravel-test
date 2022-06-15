<?php

namespace App\Repositories\MenuItem;

use App\Models\MenuItem;

class MenuItemRepository implements MenuItemInterface

{
	/**
    * @var MenuItem
    */
    private $menuItem;
    /**
     * MenuItemRepository constructor.
     * 
     * @param MenuItem $menuItem
     * 
     */   
	public function __construct(MenuItem $menuItem) {
		$this->menuItem = $menuItem;
	}
	/**
	 * Get All MenuItems
	 * @param
	 * */
	public function getAll()
    {
        try {
        	$menuItems = $this->menuItem->getTree();
        	return response()->json($menuItems , 200);

    	} catch (\Exception $e) {
	        return array('status' => false, 'message' => 'error: \n'.$e->getMessage());
    	}
	}

}