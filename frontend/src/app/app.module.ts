import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import {PostsService} from "./services/posts.service";
import {HttpModule} from "@angular/http";

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
      HttpModule
  ],
  providers: [
      PostsService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
