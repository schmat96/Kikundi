<link rel="stylesheet" href="user/create-project-idea.template.css">
<div class="container">
    <div class="row">
        <div class="col-xl-12 main-container">
            <h1>New Project-Idea</h1>
            <form action="../../controller/PostController.php" method="get">
                <div class="form-group">
                    <input type="hidden" name="postLabel" value="createProject" />
                    <div class="row">
                        <div class="col-xl-6" id="left-input">
                            <h3>Project name</h3>
                            <input class="text-input form-control full-width" name="name">
                            <h3>Project description</h3>
                            <textarea class="text-input form-control full-width" name="description"></textarea>
                        </div>
                        <div class="col-xl-6" id="right-input">
                            <h3>Project-Settings</h3>
                            <div class="full-width range-holder">
                                <label for="difficulty">Difficulty</label>
                                <input type="range" class="custom-range" min="0" max="10" id="difficulty" name="difficulty">
                            </div>
                            <div class="full-width range-holder">
                                <label for="size1">Min size</label>
                                <input type="range" class="custom-range" min="0" max="10" name="minMembers" id="size1">
                            </div>
                            <div class="full-width range-holder">
                                <label for="size2">Max size</label>
                                <input type="range" class="custom-range" min="0" max="10" name="maxMembers" id="size2">
                            </div>
                        </div>

                        <div class="center-text button-holder">
                            <button type="submit" class="create-project">Create project</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
