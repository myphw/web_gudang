
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">
            
                <a href="surat_jalan_checkin" class="btn btn-blackstone btn-block" style="color:black">
                - SURAT JALAN CHECK IN -</a>
                <a href="surat_jalan_checkout" class="btn btn-rossi btn-block" style="color:blue" >
                - SURAT JALAN CHECK OUT -</a>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<script>

  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });

</script>