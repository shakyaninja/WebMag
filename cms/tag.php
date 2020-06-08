<?php
$header = "Tags";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <?php flashMessage(); ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Tags</h3>
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
                        <h2>Tags</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addTag();">Add Tag</a>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>Tags name</th>
                                <th>Added Date</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $Tag = new tag();
                                $tags = $Tag->getAllTag();
                                foreach ($tags as $key => $tag) {
                                ?>
                                    <tr>
                                        <td><?php echo ($key+1).'.'; ?></td>
                                        <td><?php echo $tag->name; ?></td>
                                        <td><?php echo ($tag->created_date);?></td>
                                        <td>
                                        <a class="btn btn-info" href="javascript:;" onclick="editTag(this);" data-tag_info = '<?php echo(json_encode($tag)) ?>'><i class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger" href="./process/tag?id=<?php echo( $tag->id)?>&amp;act=<?php echo(substr(md5("Delete-Tag-".$tag->id.$_SESSION['token']),5,15)) ?>" ><i class="fa fa-trash"></i></a>
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
                                        <h4 class="modal-title" id="title">Add Tag</h4>
                                    </div>
                                    <form action="./process/tag" method="post">

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Tag Name</label>
                                                <input type="text" id="tagname" class="form-control" name="name" placeholder="Tag Name">
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
<script src="./assets/js/datatable.js"></script>
<script type="text/javascript">
    function addTag() {
        $('#title').html('Add Tag');
        $('#id').removeAttr();
        showModal();
    }
    function editTag(element){
        $('#id').val()
        var tag_info = $(element).data('tag_info'); //data from HTML to JS through tag attribute
        if(typeof(tag_info) != 'object'){
            tag_info = JSON.parse(tag_info);
        }        
        $('#title').html('Edit Tag');
        $('#tagname').val(tag_info.tagname);
        $('#id').val(tag_info.id);
        showModal();
    }

    function showModal(data = '') {
        $('.modal').modal('show');
    }
</script>