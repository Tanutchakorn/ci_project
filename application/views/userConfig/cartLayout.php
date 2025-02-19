<form action="<?php echo base_url("cart/Checkout/showItems"); ?>" method="post" name="CartForm">
  <div class="container BGPanel my-2 bg-light">
    <div class="row">
      <div class="col HDText mt-2">
        My Cart

      </div>
    </div>
    <div class="dropdown-divider"></div>
    <div class="row">
      <div class="col">
        <?php $ari = 0;
        $arid; ?>
        <?php if (count($cart) == 0) {
          echo "<div class='HDText text-center' >ไม่มีรายการ</div>";
        } else { ?>
          <div class="row ofPanel px-2">
            <table class="table table-striped border-0">
              <!--Header-->
              <tr>
                <th>รูปสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th width="150" class="text-center">จำนวน</th>
                <th class="text-center">ราคารวม</th>
                <th class="text-center"><a href="<?php echo base_url("MyAccount/clearCart"); ?>" class="btn btn-outline-danger">ล้าง</a></th>
              </tr>
              <!--Content-->
              <?php foreach ($cart as $c) {  ?>
                <tr>
                  <td><img class="card-img-top p-2 img-fluid" src="<?php echo $c->{'image_url'}; ?>" alt="Card image cap Responsive image" style="width: 175px; height:175px;"></td>
                  <td><?php echo $c->{'product_name'}; ?></td>
                  <td class="text-center"><?php echo $c->{'qty'}; ?></td>
                  <td class="text-center" id="sumrow<?php echo $ari; ?>" name="sumrow<?php echo $ari; ?>"> <strong>
                      <?php echo number_format($c->{'sum_row'}, 2); ?>
                    </strong>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo base_url("shop/Product/index/$c->product_id/");
                              echo $this->session->userdata("user_id"); ?>" class="btn btn-warning" style="width: 75px;">แก้ไข</a>
                    <a href="<?php echo base_url("cart/Delete/deleteCart/");
                              echo $c->{'product_id'}; ?>" class="btn btn-danger" style="width: 75px;">ลบ</a>
                  </td>

                </tr>
              <?php $ari++;
                $sumtotal = $c->{'sum_total'};
              } ?>
            </table>
          </div>
          <div class="row mt-2 mr-3" style="border-color:black; float:right;">
            <div class="col">
              <h2 id="SumtotalH2" class="text-right">รวม <label id="sumtotalLB"><?php echo number_format($sumtotal, 2); ?></label> บาท </h2>
            </div>

            <!-- <button class="btn btn-danger">ปิด</button> -->
          </div>

        <?php } ?>
      </div>
    </div>
  </div>
  <?php if (!count($cart) == 0) { ?>
    <div class="container my-2 bg-light">
      <div class="row">
        <div class="col HDText mt-2">
          ชำระเงิน
        </div>
      </div>
      <div class="dropdown-divider"></div>
      <div class="row">
        <div class="col-4 py-1">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Payment " id="Card" value="option1" checked>
            <label class="form-check-label" for="Card">
              <h3>บัตรเครดิต / เดบิต</h3>
            </label>
          </div>
        </div>
        <div class="col-4 py-1">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Payment " id="Bank" value="option2">
            <label class="form-check-label" for="Bank">
              <h3>โอนเงินผ่านบัญชีธนาคาร</h3>
            </label>
          </div>
        </div>
        <div class="col-4 py-1">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Payment " id="IB" value="option2">
            <label class="form-check-label" for="IB">
              <h3>อินเตอร์เน็ตแบงค์กิ้ง</h3>
            </label>
          </div>
        </div>
        <div class="col-4 py-1">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Payment " id="counter" value="option2">
            <label class="form-check-label" for="counter">
              <h3>เงินสดผ่านเคาน์เตอร์</h3>
            </label>
          </div>
        </div>
        <div class="col-4 py-1">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Payment " id="Online" value="option2">
            <label class="form-check-label" for="Online">
              <h3>บัญชีออนไลน์</h3>
            </label>
          </div>
        </div>
        <div class="col-12 mb-1 py-1 text-right">
          <button type="submit" class="btn btn-lg btn-primary">Check Out!!</button>
        </div>
      </div>
    </div>
  <?php } ?>
</form>

<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/BAHTTEXT.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var x = <?php echo $sumtotal; ?>;
    document.getElementById("SumtotalH2").innerHTML += '<br>(' + BAHTTEXT(x) + ')';
  });
</script>