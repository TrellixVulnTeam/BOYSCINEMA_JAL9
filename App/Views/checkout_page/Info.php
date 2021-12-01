<div class="information-detail">
    <div class="title d-flex justify-content-center align-items-center">
        <div class="title--text">THÔNG TIN ĐƠN HÀNG</div>      
    </div>
    <div class="row">
            <div class="col-3 name-film"><?php echo $data['schedule']->getFilm()->name?></div>
            <div class="col-3 address">BOYS <?php echo $data['schedule']->getTheater()->address?></div>
            <div class="col-3 address"><?php echo $data['showtime']->getRoom()->name?></div>
            <div class="col-3 time"><?php echo $data['schedule']->date." - ".$data['showtime']->start_time?></div>
    </div>
    <div class="row">
        <?php
            foreach($data['seat'] as $item){
                if(!$item->type){
                    $seatNormal[] = $item->name;
                }
                else $seatVip[]=$item->name;
            }
            echo "
            <div class='col-4'>
                <p class='item-rep' style='font-weight: bold;'>GHẾ THƯỜNG</p>
            </div>
            <div class='col-4'>
                <p class='item-rep' style='font-weight: bold;'>2 VÉ</p>
                <p class='item-rep' style='font-weight:lighter'>".printSeat($seatNormal)."</p>
            </div>
            <div class='col-4'>
                <p class='item-rep' style='font-weight: bold;'>ĐƠN GIÁ</p>
                <P class='item-rep' style='font-weight:lighter'>150.000 VNĐ</P>
            </div>";
            function printSeat($seat){
                $str="";
                foreach($seat as $item) $str .= $item.", ";
                return substr($str,0,-2);
            }
        ?> 
    </div>
    <div class="row">
        <div class="tolal-amount">
            <div class="total-amount--text">THÀNH TIỀN:  <span style="color: aqua;">300.000 VNĐ</span></div>
        </div>
    </div>
    
</div>