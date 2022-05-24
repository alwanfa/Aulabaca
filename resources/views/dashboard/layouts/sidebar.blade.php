<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{Request::is('dashboard/posts*')?'active':''}}" href="/dashboard/posts">
          <i class="fa-solid fa-book"></i>
          Dashboard
        </a>
      </li>
    </ul>
  </div>
</nav>