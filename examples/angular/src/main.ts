import { CommonModule } from '@angular/common';
import { bootstrapApplication } from '@angular/platform-browser';
import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { OctaviaCmsService, Content, FormItem } from './app/services/octavia-cms.service';

@Component({selector:'app-root',standalone:true,imports:[CommonModule,FormsModule,HttpClientModule],template:`<main style="font-family:sans-serif;max-width:820px;margin:2rem auto"><h1>Octavia AI CMS — Angular</h1><p style="color:crimson">{{error()}}</p><input placeholder="Title" [(ngModel)]="title" /><br/><textarea placeholder="Body" [(ngModel)]="body"></textarea><br/><input [(ngModel)]="locale" /><br/><button (click)="create()">Create</button> <button (click)="refresh()">Refresh</button><ul><li *ngFor="let item of items()">{{item.title}} ({{item.status}}) <button [disabled]="item.status==='published'" (click)="publish(item.id)">Publish</button></li></ul><hr/><h2>Form Demo</h2><p>Available forms: {{forms().length}}</p><input placeholder="Form ID" [(ngModel)]="formId" /><br/><input placeholder="Email" [(ngModel)]="email" /><br/><button (click)="submitForm()">Submit Form</button></main>`})
class AppComponent { private svc = inject(OctaviaCmsService); items = signal<Content[]>([]); forms = signal<FormItem[]>([]); error = signal(''); title=''; body=''; locale='en-US'; formId=''; email='';
  ngOnInit(){ this.refresh(); }
  refresh(){ this.svc.list().subscribe({next:v=>this.items.set(v),error:e=>this.error.set(e.message)}); this.svc.listForms().subscribe({next:v=>this.forms.set(v),error:e=>this.error.set(e.message)}); }
  create(){ if(!this.title||!this.body||!this.locale){this.error.set('All fields are required.');return;} this.svc.create({title:this.title,body:this.body,locale:this.locale}).subscribe({next:()=>{this.title='';this.body='';this.refresh();},error:e=>this.error.set(e.message)}); }
  publish(id:string){ this.svc.publish(id).subscribe({next:()=>this.refresh(),error:e=>this.error.set(e.message)}); }
  submitForm(){ if(!this.formId||!this.email){this.error.set('Form ID and email are required.');return;} this.svc.submitForm(this.formId,{email:this.email}).subscribe({next:()=>{this.email='';},error:e=>this.error.set(e.message)}); }
}
bootstrapApplication(AppComponent);
