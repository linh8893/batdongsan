<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class M_productions extends MY_Model{
    public $table="productions ";
    public function get_list_all($start=0,$limit=10){
        $date=strtotime("00:00:00 ".date('d-m-Y',time()));
        $str="select productions.id as id, productions.title as title, productions.public_time as public_time, productions.price as price, productions.acreage as acreage, productions.thumbnail as thumbnail, cities.name as city, districts.name as district,
            units.name as unit, streets_code,projects_code,wards_code,groups_code
            from productions, cities, districts,units where productions.cities_code = cities.code and productions.districts_code = districts.code and units.code = productions.units_code  and productions.status=1 and public_time <=".$date." and exp_time>=".$date." order by productions.view desc limit ".$start.",".$limit;
        $query = $this->db->query($str);
        return $query->result();
    }
    public function get_list_nav_cities(){
    	$str="select cities.id as id, cities.name as name,cities.slug as slug, count(*) as count_bds 
    		from productions, cities where productions.status=1 and productions.cities_code = cities.code group by productions.cities_code order by count_bds desc";
    	$query = $this->db->query($str);
		return $query->result();
    }
    public function get_list_cities($groups_type=1){
        $str="select cities.id as id, cities.name as name,cities.slug as slug, count(*) as count_bds 
            from productions, cities where productions.groups_type=".$groups_type." and  productions.cities_code = cities.code group by productions.cities_code order by cities.order_index desc";
        $query = $this->db->query($str);
        return $query->result();
    }

    public function get_list_nav_districts(){
    	$str="select *
    		from districts where status=1 order by view desc limit 0,20";
    	$query = $this->db->query($str);
		return $query->result();
    }
    public function get_list_nav_new_productions(){
    	$str="select productions.id as id, productions.title as title, productions.public_time as public_time, productions.price as price, productions.acreage as acreage, productions.thumbnail as thumbnail, cities.name as city, districts.name as district,
    		units.name as unit
    		from productions, cities, districts,units where productions.cities_code = cities.code and productions.districts_code = districts.code and units.code = productions.units_code  order by productions.view desc limit 0,5";
    	$query = $this->db->query($str);
		return $query->result();
    }
}

