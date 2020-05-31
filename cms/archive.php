<?php
$header = "Archive";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <?php flashMessage(); ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Archive</h3>
            </div>

            <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Archive</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addArchive();">Add archive</a>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>Archive</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $Archive = new archive();
                                $archives = $Archive->getAllArchive();
                                foreach ($archives as $key => $archive) {
                                ?>
                                    <tr>
                                        <td><?php echo ($key+1).'.'; ?></td>
                                        <td><?php echo date("M d,Y h:i:s a",strtotime($archive->date))?></td>
                                        <td><?php echo date("Y ",strtotime($archive->date))?></td>
                                        <td><?php echo date("M ",strtotime($archive->date))?></td>
                                        <td><?php echo date("d ",strtotime($archive->date))?></td>
                                        
                                        <td class="text-center">
                                            <!-- data in HTML tags as attribute -->
                                            <!-- for passing unique id we wil pass this as reference -->
                                            <a class="btn btn-info" href="javascript:;" onclick="editArchive(this);" data-archive_info = '<?php echo(json_encode($archive)) ?>'><i class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger" href="./process/archive?id=<?php echo( $archive->id)?>&amp;act=<?php echo(substr(md5("Delete-Archive-".$archive->id.$_SESSION['token']),5,15)) ?>" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="title">Add Archive</h4>
                                    </div>
                                    <form action="./process/archive" method="post">

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="archive_name">Archive Name</label>
                                                <input type="text" id="archivename" class="form-control" name="archive_name" placeholder="Archive Name">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" id="id" name="id" class="id">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script src="./assets/js/datatable.js"></script>
<script type="text/javascript">
    function addArchive() {
        $('#title').html('Add Archive');
        $('#id').removeAttr();
        showModal();
    }
    function editArchive(element){
        $('#id').val()
        var archive_info = $(element).data('archive_info'); //data from HTML to JS through tag attribute
        if(typeof(archive_info) != 'object'){
            archive_info = JSON.parse(archive_info);
        }        
        $('#title').html('Edit Archive');
        $('#archivename').val(archive_info.archivename);
        $('#id').val(archive_info.id);
        showModal();
    }

    function showModal() {
        $('.modal').modal('show');
    }
</script>