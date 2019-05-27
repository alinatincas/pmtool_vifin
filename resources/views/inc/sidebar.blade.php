<aside class="aside-vifin">
    <div class="row {{ Request::is('/') ? 'active' : ''   }} ">
        <div class="col-3">
            <a href="/">
                <i class="fas fa-home icon-home-vifin"></i>
            </a>
        </div>
        <div class="col-9">
            <a href="/">
                <h5>HOME</h5>
            </a>
        </div>
    </div>
    <div class="row {{ Request::segment(1) === 'timesheet' ? 'active' : null  }}">
        <div class="col-3">
            <a href="/timesheet">
                <i class="fas fa-clock icon-home-vifin"></i>
            </a>
        </div>
        <div class="col-9">
            <a href="/timesheet">
                <h5>TIMESHEET</h5>
            </a>
        </div>
    </div>
    <div class="row {{ Request::segment(1) === 'projects' ? 'active' : null  }}">
        <div class="col-3">
            <a href="/projects">
                <i class="fas fa-layer-group icon-home-vifin"></i>
            </a>
        </div>
        <div class="col-9">
            <a href="/projects">
                <h5>PROJECTS</h5>
            </a>
        </div>
    </div>
    <div class="row {{ Request::segment(1) === 'employees' ? 'active' : null  }}">
        <div class="col-3">
            <a href="/employees">
                <i class="fas fa-users icon-home-vifin"></i>
            </a>
        </div>
        <div class="col-9">
            <a href="/employees">
                <h5>EMPLOYEES</h5>
            </a>
        </div>
    </div>
    <div class="row {{ Request::segment(1) === 'profile' ? 'active' : null  }}">
        <div class="col-3">
            <a href="/profile">
                <i class="fas fa-user-alt icon-home-vifin"></i>
            </a>
        </div>
        <div class="col-9">
            <a href="/profile">
                <h5>PROFILE</h5>
            </a>
        </div>
    </div>
</aside>
