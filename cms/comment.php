<?php
$header = "Comment";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <?php flashMessage(); ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Comment</h3>
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
                        <h2>Comment</h2>
                        <!-- <ul class="nav navbar-right panel_toolbox">
                            <!-- <a href="javascript:;" class="btn btn-primary" onclick="addComment();">Add comment</a> -->
                        <!-- </ul> -->
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Message</th>
                                <th>Time</th>
                                <th>CommentType</th>
                                <th>CommentID</th>
                                <th>BlogID</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $Comment = new comment();
                                $comments = $Comment->getAllWaitingComment();
                                foreach ($comments as $key => $comment) {
                                ?>
                                    <tr>
                                        <td><?php echo ($key+1).'.'; ?></td>
                                        <td><?php echo $comment->name; ?></td>
                                        <td><?php echo $comment->email; ?></td>
                                        <td><?php echo $comment->website; ?></td>
                                        <td><?php echo html_entity_decode($comment->message); ?></td>
                                        <td><?php echo date("M d, Y h:i:s a",strtotime($comment->created_date)); ?></td>
                                        <td><?php echo $comment->commentType; ?></td>
                                        <td><?php echo (isset($comment->commentid)&& !empty($comment->commentid))?$comment->commentid:""; ?></td>
                                        <td><?php echo $comment->blogid; ?></td>
                                        <td class="text-center">
                                            <!-- data in HTML tags as attribute -->
                                            <!-- for passing unique id we wil pass this as reference -->
                                            <a class="btn btn-success" href="./process/comment?id=<?php echo( $comment->id)?>&amp;act=<?php echo(substr(md5("accept-Comment-".$comment->id.$_SESSION['token']),5,15)) ?>">Accept</a>
                                            <a class="btn btn-danger" href="./process/comment?id=<?php echo( $comment->id)?>&amp;act=<?php echo(substr(md5("reject-Comment-".$comment->id.$_SESSION['token']),5,15)) ?>" >Reject</a>
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
                                        <h4 class="modal-title" id="title">Add Comment</h4>
                                    </div>
                                    <form action="./process/comment" method="post">

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="comment_name">Comment Name</label>
                                                <input type="text" id="commentname" class="form-control" name="comment_name" placeholder="Comment Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Comment Description</label>
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
