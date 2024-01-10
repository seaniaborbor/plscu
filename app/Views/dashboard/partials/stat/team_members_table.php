<div class="table-responsive">
	
 <table id="example3" class="table table-hover w-100  table-striped border">
   <thead>
      <tr class="bg-secnodary text-dark">
        <td></td>
      <td>Full Name</td>
      <td>Email</td>
      <td>Profession</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($users_table)): ?>
   
      <?php foreach($users_table as $clb_mdm) : ?>
    
        <tr>
          <td>
            <img  src='<?=base_url('uploads/'.$clb_mdm['profileImg'])?>' style="height:50px; width:50px;" class="img-thumbnail rounded-circle">
          </td>
          <td>
            <?=$clb_mdm['fullName']?>
          </td>
          <td><?=$clb_mdm['email'] ?></td>
          <td><?=$clb_mdm['profession'] ?></td>
        </tr>
   
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>