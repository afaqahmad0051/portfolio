<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © {{auth()->user()->name}}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Login From: <strong>{{auth()->user()->username}}</strong>
                </div>
            </div>
        </div>
    </div>
</footer>