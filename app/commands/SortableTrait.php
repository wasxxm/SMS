<?php
// http://hack.swic.name/laravel-column-sorting-made-easy/
trait SortableTrait
{
    public function scopeSortable($query)
	{
		if(Schema::hasColumn($this->getTable(), Input::get('s')) && Input::has('s') && Input::has('o') && Input::get('s') != '' && Input::get('o') != '')
            return $query->orderBy(Input::get('s'), Input::get('o'));
        else
            return $query;
    }
 
    public static function link_to_sorting_action($col, $title = null)
	{
		
		if (is_null($title)) {
            $title = str_replace('_', ' ', $col);
            $title = ucfirst($title);
        }
 
        $indicator = (Input::get('s') == $col ? (Input::get('o') === 'asc' ? '&uarr;' : '&darr;') : null);
        $parameters = array_merge(Route::getCurrentRoute()->parameters(), array('s' => $col, 'o' => (Input::get('o') === 'asc' ? 'desc' : 'asc')));
 
        return link_to_route(Route::currentRouteName(), "$title $indicator", $parameters);
    }
}
?>