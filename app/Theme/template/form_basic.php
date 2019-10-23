<div class="card">
  <div class="card-body">
    <h4 class="card-title">Basic input groups</h4>
    <p class="card-description">
      Basic bootstrap input groups
    </p>
    <form method="" action="" class="forms-sample">
      <div class="form-group">
        <label for="exampleInputName1">Form Text</label>
        <input type="text" class="form-control" name="" id="exampleInputName1" placeholder="Text">
      </div>
      <div class="form-group">
        <label for="exampleInputName1">Form Number</label>
        <input type="number" class="form-control" name="" id="exampleInputName1" placeholder="Number">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail3">Email address</label>
        <input type="email" class="form-control" name="" id="exampleInputEmail3" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword4">Password</label>
        <input type="password" class="form-control" name="" id="exampleInputPassword4" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Default select</label>
        <select class="form-control" id="exampleFormControlSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label>File upload</label>
        <input type="file" name="" class="file-upload-default">
        <div class="input-group col-xs-12">
          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
          <span class="input-group-append">
            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input"> Default
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Checked
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" disabled> Disabled
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" disabled checked> Disabled checked
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="form-radio">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="" id="optionsRadios1" value="" checked> Option one
              </label>
            </div>
            <div class="form-radio">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="" id="optionsRadios2" value="option2"> Option two
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-radio disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="" id="optionsRadios3" value="option3" disabled> Option three is disabled
              </label>
            </div>
            <div class="form-radio disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="" id="optionsRadios4" value="option4" disabled checked> Option four is selected and disabled
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleTextarea1">Textarea</label>
        <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
      </div>
      <button type="submit" class="btn btn-success mr-2">Submit</button>
      <button type="reset" class="btn btn-light">Cancel</button>
    </form>
  </div>
</div>