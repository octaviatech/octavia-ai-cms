import { CommonModule } from "@angular/common";
import { HttpClientModule } from "@angular/common/http";
import { Component, inject, signal } from "@angular/core";
import { FormsModule } from "@angular/forms";
import { bootstrapApplication } from "@angular/platform-browser";
import {
  Content,
  FormItem,
  OctaviaCmsService,
} from "./app/services/octavia-cms.service";

type Page = "blog" | "forms";

@Component({
  selector: "app-root",
  standalone: true,
  imports: [CommonModule, FormsModule, HttpClientModule],
  template: `
    <main class="min-h-screen bg-slate-950 text-slate-100">
      <div class="mx-auto max-w-5xl p-6">
        <h1 class="mb-6 text-3xl font-bold">Octavia CMS - Angular</h1>

        <div class="mb-6 flex gap-2">
          <button
            class="rounded px-4 py-2"
            [class.bg-cyan-500]="page() === 'blog'"
            [class.text-slate-950]="page() === 'blog'"
            [class.bg-slate-800]="page() !== 'blog'"
            (click)="page.set('blog')"
          >
            Blog Page
          </button>
          <button
            class="rounded px-4 py-2"
            [class.bg-cyan-500]="page() === 'forms'"
            [class.text-slate-950]="page() === 'forms'"
            [class.bg-slate-800]="page() !== 'forms'"
            (click)="page.set('forms')"
          >
            Form Page
          </button>
          <button class="rounded bg-slate-700 px-4 py-2" (click)="refreshAll()">
            Refresh
          </button>
        </div>

        <p *ngIf="error()" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">
          {{ error() }}
        </p>

        <section *ngIf="page() === 'blog'" class="space-y-6">
          <div class="rounded border border-slate-800 bg-slate-900 p-4">
            <h2 class="mb-3 text-xl font-semibold">Create Article</h2>
            <div class="space-y-3">
              <input
                class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                placeholder="Title"
                [(ngModel)]="title"
              />
              <textarea
                class="h-36 w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                placeholder="Body"
                [(ngModel)]="body"
              ></textarea>
              <input
                class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                placeholder="Locale (en/fa)"
                [(ngModel)]="locale"
              />
              <button
                class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
                [disabled]="loading()"
                (click)="createArticle()"
              >
                Create
              </button>
            </div>
          </div>

          <div class="rounded border border-slate-800 bg-slate-900 p-4">
            <h2 class="mb-3 text-xl font-semibold">Blog List</h2>
            <ul class="space-y-2">
              <li
                *ngFor="let item of items()"
                class="flex items-center justify-between rounded border border-slate-800 bg-slate-950 p-3"
              >
                <div>
                  <p class="font-medium">{{ item.title }}</p>
                  <p class="text-sm text-slate-400">
                    {{ item.locale }} · {{ item.status }}
                  </p>
                </div>
                <button
                  class="rounded bg-emerald-500 px-3 py-1 text-sm font-medium text-slate-950 disabled:opacity-50"
                  [disabled]="item.status === 'published' || loading()"
                  (click)="publishArticle(item.id)"
                >
                  Publish
                </button>
              </li>
            </ul>
          </div>
        </section>

        <section *ngIf="page() === 'forms'" class="space-y-6">
          <div class="rounded border border-slate-800 bg-slate-900 p-4">
            <h2 class="mb-3 text-xl font-semibold">Available Forms</h2>
            <ul class="space-y-2">
              <li
                *ngFor="let f of forms()"
                class="rounded border border-slate-800 bg-slate-950 p-3"
              >
                <p class="font-medium">{{ f.title || "(untitled form)" }}</p>
                <p class="text-xs text-slate-400">id: {{ f.id }}</p>
              </li>
            </ul>
          </div>

          <div class="rounded border border-slate-800 bg-slate-900 p-4">
            <h2 class="mb-3 text-xl font-semibold">Submit Form</h2>
            <div class="space-y-3">
              <input
                class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                placeholder="Form ID"
                [(ngModel)]="formId"
              />
              <input
                class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                placeholder="Email"
                [(ngModel)]="email"
              />
              <button
                class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
                [disabled]="loading()"
                (click)="submitForm()"
              >
                Submit
              </button>
            </div>
          </div>
        </section>
      </div>
    </main>
  `,
})
class AppComponent {
  private svc = inject(OctaviaCmsService);

  page = signal<Page>("blog");
  loading = signal(false);
  error = signal("");

  items = signal<Content[]>([]);
  title = "";
  body = "";
  locale = "en";

  forms = signal<FormItem[]>([]);
  formId = "";
  email = "";

  ngOnInit() {
    this.refreshAll();
  }

  refreshAll() {
    this.loading.set(true);
    this.error.set("");
    this.svc.list().subscribe({
      next: (v) => this.items.set(v),
      error: (e) => this.error.set(e.message),
      complete: () => this.loading.set(false),
    });
    this.svc.listForms().subscribe({
      next: (v) => this.forms.set(v),
      error: (e) => this.error.set(e.message),
    });
  }

  createArticle() {
    if (!this.title || !this.body) {
      this.error.set("Title and body are required.");
      return;
    }
    this.loading.set(true);
    this.error.set("");
    this.svc
      .create({ title: this.title, body: this.body, locale: this.locale })
      .subscribe({
        next: () => {
          this.title = "";
          this.body = "";
          this.refreshAll();
        },
        error: (e) => this.error.set(e.message),
        complete: () => this.loading.set(false),
      });
  }

  publishArticle(id: string) {
    this.loading.set(true);
    this.error.set("");
    this.svc.publish(id).subscribe({
      next: () => this.refreshAll(),
      error: (e) => this.error.set(e.message),
      complete: () => this.loading.set(false),
    });
  }

  submitForm() {
    if (!this.formId || !this.email) {
      this.error.set("Form ID and email are required.");
      return;
    }
    this.loading.set(true);
    this.error.set("");
    this.svc.submitForm(this.formId, { email: this.email, language: this.locale }).subscribe({
      next: () => {
        this.email = "";
      },
      error: (e) => this.error.set(e.message),
      complete: () => this.loading.set(false),
    });
  }
}

bootstrapApplication(AppComponent);

