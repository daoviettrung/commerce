<div class="menu bg-dark">
    <div class="dropdown">
      <button class="dropbtn btn-menu">Dashboard</button>
    </div>
    <div class="dropdown">
      <button class="dropbtn btn-menu">Category</button>
      <div class="dropdown-content">
        <a href="{{ url('categories/create') }}">Add category</a>
        <a href="{{ url('categories') }}">View category</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn btn-menu">Product</button>
      <div class="dropdown-content">
        <a href="{{ url('product/create')}}">Add product</a>
        <a href="{{ url('product')}}">View product</a>
      </div>
    </div>
  </div>