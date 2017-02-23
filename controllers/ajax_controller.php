<?php

class AjaxController {

    public function cities() {

        $reg = $_POST['region'];
        
        $territory = new Territory();

        $cities = $territory->selectTerritory(2, $reg);

        if (empty($cities))
            return false;

        $html = '<select  id="city" class="chosen-select" name="city" data-placeholder="Select City" required> <option></option>';
        foreach ($cities as $city) {

            $html .= '<option value="' . $city->ter_id . '">' . $city->address . '</option>';
        }

        $html .= '</select>';

        echo $html;
    }

    public function areas() {

        $reg = intval($_POST['region']);
        
        $ter_pid = trim($_POST['city']);           

        $territory = new Territory();

        $areas = $territory->selectTerritory('>1', $reg, $ter_pid);
        
        if(empty($areas)) return false;

        $html = '<select  id="area" class="chosen-select" name="area"data-placeholder="Select Area" required> <option></option>';
        foreach ($areas as $area) {

            $html .= '<option value="' . $area->ter_id . '">' . $area->address . '</option>';
        }

        $html .= '</select>';

        echo $html;
    }

    public function saveUser() {
        
        $area = (isset($_POST['area']))? $_POST['area'] : $_POST['city'];

        $user = new User($_POST['name'], $_POST['email'], $area);

        if (!($user->select($user->email))) {
            
            $user->save();
            echo json_encode(['true', $user->name]);
            
        } else {
            
            echo json_encode(['false', $user]);
            
        }
    }

}
