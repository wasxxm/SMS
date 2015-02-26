<?php

/*
Helper Functions
*/

function format_date($date_string, $day = true)
{  
   if (!check_date($date_string)) return;
   
   if ($day)
   {
      return Date::parse($date_string)->format('l, j F Y');	
   }
   else
   {
	  return Date::parse($date_string)->format('j F Y');   
   }
}

function format_datetime($date_string, $day = true)
{
   if (!check_date($date_string)) return;
   
   if ($day)
   {
      return Date::parse($date_string)->format('l, j F Y h:i:s');	
   }
   else
   {
	  return Date::parse($date_string)->format('j F Y');   
   }	
}

function check_date($date_string)
{
   if (!is_string($date_string))
   {
      $year = date_parse($date_string->toFormattedDateString());
   }
   else
   {
	   $year = date_parse($date_string);   
   }
   if (!$year['year']) return;	
   
   return true;
}

// macro for generating the active class for menu links
HTML::macro('menu_active', function($route, $matchExact = false)
{
   if($matchExact && Request::is($route))
   {
      $active = "active open start";
   }
   elseif(!$matchExact && (Request::is($route . '/*') || Request::is($route)))
   {
      $active = "active open";
   }
   else
   {
      $active = '';
   }
   
   return $active;
});

// macro to include html in form::label
Form::macro('label_html', function($name, $value = null, $options = array())
{
	$label = Form::label($name, '%s', $options);

    return sprintf($label, $value);
});



?>