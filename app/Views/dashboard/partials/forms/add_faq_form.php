<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-4">
            <h3>About Frequently Asked Questions</h3>
          <p>The frequently asked question(FAQ) allows you answer most of questions people ask most about your business, entity or services so that 
          someone who doesn't know alread can get to the answer by visiting your website. It's recommended to answer the top five - but you can answer as much as you want.</p>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              Dismiss
            </button>
        </div>
      </div>
    </div>
  </div>


   <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex justify-content-between mb-3 ">
            <h3>Add New Post Category</h3>
            <button type="button" class="btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#categoryModal">
              <i class="bi bi-question"></i>
            </button>
          </div>
          <form action="<?=base_url('dashboard/faq')?>" method="post">

            <div class="form-group mb-3">
              <label>Question</label>
              <input type="text" name="question" value="<?= set_value('question')?>" class="form-control form-control-lg" >
              <?php if(isset($category_validation) && $category_validation->hasError('question')) : ?>
                 <div class="text-danger"><?=$category_validation->getError('question')?></div>
              <?php endif; ?>
            </div>

            <div class="form-group mb-3">
              <label>Answer to question</label>
              <textarea name="answer" value="<?= set_value('answer')?>" class="form-control form-control-lg" ></textarea>
              <?php if(isset($category_validation) && $category_validation->hasError('answer')) : ?>
                 <div class="text-danger"><?=$category_validation->getError('answer')?></div>
              <?php endif; ?>
            </div>

            <button class="btn  btn-success mt-3 ">Submit</button>
          </form>
        </div>
      </div>