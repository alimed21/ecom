<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">

            </div>
            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        Tous les droits sont réservés&copy;MyExpress <script>document.write(new Date().getFullYear());</script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/style/scripts/main.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script>
    $( "#promo" ).hide();
    $("#file").on("change", function() {
        if($("#file")[0].files.length > 3) {
            alert("Vous etes autorisé à selectionner que trois fichiers");
            $(this).val('');
        } else {
        }
    });

    $( "#oui" ).click(function() {
        $( "#promo" ).show();
    });

    $( "#non" ).click(function() {
        $( "#promo" ).hide();
    });

    $("#cate").on('change',function (){
       var id = $(this).val();
       $.ajax({
          url:'<?php echo base_url();?>Admin/Produit/getsubcategory?cid='+id,
          success:function(result){
              $('#subcate').html(result);
        }
       });
    });
</script>

</body>
</html>
