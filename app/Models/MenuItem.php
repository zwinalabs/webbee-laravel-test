<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';
    
	public function parent()
    {
        return $this->belongsTo('App\Models\MenuItem', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\MenuItem', 'parent_id');
    }

    public static function getTree()
        {
            $menu = self::select()->get();

            if ($menu->count()) {
                foreach ($menu as $k => $menu_item) {
                    $menu_item->children = collect([]);

                    foreach ($menu as $i => $menu_subitem) {
                        if ($menu_subitem->parent_id == $menu_item->id) {
                            $menu_item->children->push($menu_subitem);

                            // remove the subitem for the first level
                            $menu = $menu->reject(function ($item) use ($menu_subitem) {
                                return $item->id == $menu_subitem->id;
                            });
                        }
                    }
                }
            }

            return $menu;
        }
}
