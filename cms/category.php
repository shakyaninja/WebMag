<?php
$header = "Category";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <?php flashMessage(); ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Category</h3>
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
                        <h2>Category</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addCategory();">Add category</a>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $Category = new category();
                                $categories = $Category->getAllCategory();
                                foreach ($categories as $key => $category) {
                                ?>
                                    <tr>
                                        <td><?php echo ($key+1).'.'; ?></td>
                                        <td><?php echo $category->categoryname; ?></td>
                                        <td><?php echo html_entity_decode($category->description);?></td>
                                        <td class="text-center">
                                            <!-- data in HTML tags as attribute -->
                                            <!-- for passing unique id we wil pass this as reference -->
                                            <a class="btn btn-info" href="javascript:;" onclick="editCategory(this);" data-category_info = '<?php echo(json_encode($category)) ?>'><i class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger" href="./process/category?id=<?php echo( $category->id)?>&amp;act=<?php echo(substr(md5("Delete-Category-".$category->id.$_SESSION['token']),5,15)) ?>" ><i class="fa fa-trash"></i></a>
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
                                        <h4 class="modal-title" id="title">Add Category</h4>
                                    </div>
                                    <form action="./process/category" method="post">

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Category Name</label>
                                                <input type="text" id="categoryname" class="form-control" name="category_name" placeholder="Category Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Category Description</label>
                                                <textarea name="description" id="description" class="form-control"></textarea>
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
    function addCategory() {
        $('#title').html('Add Category');
        $('#id').removeAttr();
        showModal();
    }
    function editCategory(element){
        $('#id').val()
        var category_info = $(element).data('category_info'); //data from HTML to JS through tag attribute
        if(typeof(category_info) != 'object'){
            category_info = JSON.parse(category_info);
        }        
        $('#title').html('Edit Category');
        $('#categoryname').val(category_info.categoryname);
        $('#id').val(category_info.id);
        showModal(category_info.description);
    }

    function showModal(data = '') {
        ckeditor(data);
        $('.modal').modal('show');
    }

    function ckeditor(data = '') {
        $('.ck').remove(); //removes previous ckeditors
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.setData(data);
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>