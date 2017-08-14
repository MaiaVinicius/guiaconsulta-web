import {Component} from '@angular/core';
import {PostsService} from "./services/posts.service";

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent {
    title = 'app';

    constructor(public postsService: PostsService) {
        postsService.getAll().subscribe(response =>
            console.log("ddd")
        );
    }
}
