
  <!-- ======================================= search ================================================-->
  <section class="search">



    <form action="{!! route('search') !!}" method="GET">

      <div class="container form-container">
        <div class="form-row">
          <div class="col-md-2">
            <select class="form-control form-control-lg js-example-basic-single1" name="category_name">
              <option selected disabled>ক্যটেগরি</option>

              @foreach ($category as $cat)
                <option>{{ $cat->category_name }}</option>

              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <select class="form-control form-control-lg js-example-basic-single2" placeholder="select city" name="subcategory_name">

  <option selected disabled>সাব-ক্যাটেগরি</option>


              @foreach ($subcategory as $scat)
                <option>{{ $scat->subcategory_name }}</option>

              @endforeach
            </select>
          </div>
          <div class="col-md-2">

            <select class="form-control  form-control-lg js-example-basic-single3" name="division_name">
  <option selected disabled>লোকেশান</option>

            @foreach ($division as $div)
              <option>{{ $div->division_name }}</option>

            @endforeach
            </select>
          </div>
          <div class="col-md-4">

            <input type="text" class="form-control form-control-lg" id="inputEmail4" placeholder="লিখুন" name="body">
          </div>
          <div class="col-md-2">
            <button class="btn btn-success" type="submit">অনুসন্ধান</button>

          </div>

        </div>


      </div>


    </form>


  </section>
  <!-- ==========================================end search========================================== -->
