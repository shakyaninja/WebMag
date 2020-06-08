<?php
$header = "Contact";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <?php flashMessage(); ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Contact</h3>
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
                        <h2>Contact</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $Contact = new contact();
                                $contacts = $Contact->getAllContact();
                                foreach ($contacts as $key => $contact) {
                                ?>
                                    <tr>
                                        <td><?php echo ($key+1).'.'; ?></td>
                                        <td><?php echo $contact->email; ?></td>
                                        <td><?php echo $contact->subject; ?></td>
                                        <td><?php echo $contact->message; ?></td>
                                        <td>
                                            <a class="btn btn-success" href="process/contact?id=<?php echo( $contact->id)?>&amp;act=<?php echo(substr(md5("Delete-Contact-".$contact->id.$_SESSION['token']),5,15)) ?>" >Respond</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php'; ?>
<script src="./assets/js/datatable.js"></script>
