<?php
$CI = &get_instance();
$CI->load->view('admin/common/header');
$segment4 = '';
$segment4 = $this->uri->segment(4);
?>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/thickbox.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>adminassets/css/thickbox.css" type="text/css" media="screen" />
<ol class="breadcrumb">
    <li class="active"><a href="#">Customers</a></li>
</ol>
<table class="table table-bordered table-hover ">
    <tr>
        <td>
            <div style="float: right ;" >
                <form  class="form-inline" action="<?php echo base_url(); ?>admin/customer/index" method="post">
                    <div class="form-group">
                        Name:
                        <input type="text" id="course" autofocus placeholder="Name" class=" form-control search-query span2" name="search" value="<?php
                        if (!empty($_POST['search'])) {
                            echo $_POST['search'];
                        } elseif (!empty($segment4) && $segment4 != 'all')
                            echo $segment4;
                        ?>"/>
                        Email:
                        <?php
                        $email_address = $this->session->userdata('email_address');
                        ?>
                        <input type="text" tabindex="3"  id="email_address" placeholder="Email Address" class=" form-control search-query span2" name="email_address" value="<?php
                        if (!empty($email_address)) {
                            echo $email_address;
                        } else if (!empty($_POST['email_address'])) {
                            echo $_POST['email_address'];
                        }
                        ?>"/>
                        Age:
                        <?php
                        $arrAge = array('<25', '>= 25');
                        $age = $this->session->userdata('age');
                        ?>
                        <select name="age" id="age" class="form-control" >
                            <option value="">Select Age</option>
                            <?php
                            if (!empty($arrAge)) {
                                foreach ($arrAge as $ages) {
                                    ?>
                                    <option value="<?php echo $ages; ?>" <?php
                                    if (!empty($ages) && $ages == $age) {
                                        echo 'selected="selected"';
                                    } else if (!empty($_POST['age']) && $_POST['age'] == $ages) {
                                        echo 'selected="selected"';
                                    }
                                    ?> ><?php echo $ages; ?>Years</option>
                                            <?php
                                        }
                                    }
                                    ?>
                        </select>

                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </td>
    </tr>
</table>
<?php
if ($this->session->flashdata('message')) {
    ?>
    <div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><?php echo $this->session->flashdata('message'); ?></div>
    <?php
}
?>
<div class="alert alert-info"> <a class="close" data-dismiss="alert">×</a>Found <?php
    if (!empty($total))
        echo $total;
    else
        echo "0";
    ?> records</div>
<table  class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Zip</th>
            <th>Telephone</th>
            <th>DOB</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($allCustomers)) {
            $i = 0;
            foreach ($allCustomers as $customers) {
                ?>
                <tr>
                    <td><?php if (!empty($customers->c_name)) echo $customers->c_name; ?></td>
                    <td><?php if (!empty($customers->c_email)) echo $customers->c_email; ?></td>
                    <td><?php if (!empty($customers->c_address)) echo $customers->c_address; ?></td>
                    <td><?php if (!empty($customers->c_zip)) echo $customers->c_zip; ?></td>
                    <td><?php if (!empty($customers->c_telephone)) echo $customers->c_telephone; ?></td>
                    <td><?php if (!empty($customers->c_dob)) echo date('d M Y', strtotime($customers->c_dob)); ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url(); ?>admin/customer/edit/<?php echo $customers->c_id; ?>" title="Click here to edit" >
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span
                        </a>
                        <a  href="<?php echo base_url(); ?>admin/customer/delete/<?php echo $customers->c_id; ?>" onclick="return confirm('Are you sure want to delete this Customer?');" title="Click here to delete" >
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span
                        </a>

                    </td>
                </tr>
                <?php
            }
        }
        else {
            ?>
            <tr><td  colspan="7">No records were found.</td></tr>
        <?php } ?>

    </tbody>
</table>
<div class="pagination">
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<?php $CI->load->view('admin/common/footer'); ?>