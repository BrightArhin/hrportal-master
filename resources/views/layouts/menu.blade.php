<li class="{{ Request::is('admin/employees*') ? 'active' : '' }}">
    <a href="{{ route('admin.employees.index') }}"><i class="fa fa-users"></i><span>Employees</span></a>
</li>

<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
    <a href="{{ route('admin.roles.index') }}"><i class="fa fa-user-o"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('admin/kpis*') ? 'active' : '' }}">
    <a href="{{ route('admin.kpis.index') }}"><i class="fa fa-edit"></i><span>Kpis</span></a>
</li>

<li class="{{ Request::is('admin/departments*') ? 'active' : '' }}">
    <a href="{{ route('admin.departments.index') }}"><i class="fa fa-home"></i><span>Departments</span></a>
</li>

<li class="{{ Request::is('admin/comments*') ? 'active' : '' }}">
    <a href="{{ route('admin.comments.index') }}"><i class="fa fa-comments"></i><span>Comments</span></a>
</li>

<li class="{{ Request::is('admin/appraisals*') ? 'active' : '' }}">
    <a href="{{ route('admin.appraisals.index') }}"><i class="fa fa-bullhorn"></i><span>Appraisals</span></a>
</li>

<li class="{{ Request::is('admin/qualifications*') ? 'active' : '' }}">
    <a href="{{ route('admin.qualifications.index') }}"><i class="fa fa-graduation-cap"></i><span>Qualifications</span></a>
</li>

<li class="{{ Request::is('admin/ranks*') ? 'active' : '' }}">
    <a href="{{ route('admin.ranks.index') }}"><i class="fa fa-cubes"></i><span>Ranks</span></a>
</li>

<li class="{{ Request::is('admin/locations*') ? 'active' : '' }}">
    <a href="{{ route('admin.locations.index') }}"><i class="fa fa-location-arrow"></i><span>Locations</span></a>
</li>

<li class="{{ Request::is('admin/grades*') ? 'active' : '' }}">
    <a href="{{ route('admin.grades.index') }}"><i class="fa fa-edit"></i><span>Grades</span></a>
</li>

<li class="{{ Request::is('admin/jobs*') ? 'active' : '' }}">
    <a href="{{ route('admin.jobs.index') }}"><i class="fa fa-wrench"></i><span>Jobs</span></a>
</li>

<li class="{{ Request::is('admin/scores*') ? 'active' : '' }}">
    <a href="{{ route('admin.scores.index') }}"><i class="fa fa-check"></i><span>Scores</span></a>
</li>

<li class="{{ Request::is('admin/employeeEmployees*') ? 'active' : '' }}">
    <a href="{{ route('admin.employeeEmployees.index') }}"><i class="fa fa-user"></i><span>Employee  Employees</span></a>
</li>

<li class="{{ Request::is('admin/employeeRoles*') ? 'active' : '' }}">
    <a href="{{ route('admin.employeeRoles.index') }}"><i class="fa fa-user-plus"></i><span>Employee  Roles</span></a>
</li>

<li class="{{ Request::is('admin/departmentKpis*') ? 'active' : '' }}">
    <a href="{{ route('admin.departmentKpis.index') }}"><i class="fa fa-home"></i><span>Department  Kpis</span></a>
</li>

<li class="{{ Request::is('admin/kpiRoles*') ? 'active' : '' }}">
    <a href="{{ route('admin.kpiRoles.index') }}"><i class="fa fa-edit"></i><span>Kpi  Roles</span></a>
</li>

<li class="{{ Request::is('admin/appraisalKpis*') ? 'active' : '' }}">
    <a href="{{ route('admin.appraisalKpis.index') }}"><i class="fa fa-edit"></i><span>Appraisal  Kpis</span></a>
</li>

<li class="{{ Request::is('admin/scoreKpis*') ? 'active' : '' }}">
    <a href="{{ route('admin.scoreKpis.index') }}"><i class="fa fa-edit"></i><span>Score  Kpis</span></a>
</li>

<li class="{{ Request::is('admin/employeeScores*') ? 'active' : '' }}">
    <a href="{{ route('admin.employeeScores.index') }}"><i class="fa fa-edit"></i><span>Employee Scores</span></a>
</li>

<li class="{{ Request::is('admin/supervisorScores*') ? 'active' : '' }}">
    <a href="{{ route('admin.supervisorScores.index') }}"><i class="fa fa-edit"></i><span>Supervisor Scores</span></a>
</li>

