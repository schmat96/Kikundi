# Kikundi

## Important Todos

0) Find an solution so we dont have to set the session_id to 100 for every user and provide in every request the userName!
1) Dispatcher: This will add alot of errors considering the required_once found all over the project. Easiest solution would be to add all required_once in the Dispatcher, best solution would be to fix all requireds after implementing the dispatcher.
2) Error Feedback for the user: Let the user know what he did wrong!
3) Fix your shit FORMS you did not even add a method="get" in the templates.
4) No more mistakes f.E. forget an underline in your shit constructors.

## Usage so far

If you need to reset the session variables you can call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=reset
```

### Common Usage

**All following Requests are Made with GET this can easily be changed by changing the method Call 'setPost()' of the PostController found at the end of [this File](https://github.com/schmat96/Kikundi/blob/master/kikundi/controller/PostController.php).**

You can call this link to add a new Admin with the given Name:
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=createProjectPool&sessionID=1&name=MaxesPool&adminName=Max
```
This will create a new Admin, if you need to double check this call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=true
```
Now you can create a new Member which needs to tell the application in which Pool (or rather the admin hash code, found in the link above) he wants to join (hashCode=***)
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=registerMember&hashCode=2KIKNeuerMember&name=NeuerMember&sessionID=111
```
Congrats! You created a new Member! Call now this link and create a new project. The sessionID must be set to the MembersID, found under ProjectController with GET['testing'] set to anything.
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=createProject&maxMembers=4&minMembers=4&difficulty=3&name=asd&description=doppelASD&tags=nope&sessionID=3KIKNeuerMember
```

This new Member or any other Member can now like that project:
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=likeProject&project=asd&sessionID=2KIKNeuerMember&status=liked
```
### Tags Usage

#### Add new Tag

This will add a new Tag
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=addTag&tag=Frozen
```

#### Look for Tag

This will check all Tags beginning with the given 'tag=' in this case 'ja'.
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=checkTag&tag=ja
```

## Testing

### How to Test:
Call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=all
```

### How to implement a new Test:
1) Create a new File Named: TestClass+Test f.E. TagControllerTest which tests the TagController.
2) Create a new Class with the name TestClass+Test which extends from controller/testing/Test.php a good example can be found under [Here](https://github.com/schmat96/Kikundi/blob/master/kikundi/controller/TagControllerTest.php)
3) Make sure you call all Test Methods in the constructur and add all error-msg to the array.

4) Add your TestClass to the [ProjetController](https://github.com/schmat96/Kikundi/blob/master/kikundi/ProjectController.php) and do the same just like the example TagControllerTest

```
else if ($_GET['testing']=='all') {
    ...
    require_once 'controller/TagControllerTest.php';
    $tct = new TagControllerTest();
    array_push($toTest, $tct);
    <-- HERE -->
} else
```
5) Test your new TestClass by using the instructions declared under the title 'How to Test'

6) Testclasses should be in the same folder as the real classes but Testing should be implemented in the TestRunner.php

### Feel free
Feel free to make it even easier to Test

### Installing



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
