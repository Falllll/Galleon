@extends('dashboard.app')
@section('title','Project')
@section('head', 'Project')
@section('header', 'Project')
@section('content')

@if(session()->has('status'))
  <div id="alert" class="z-10 absolute top-20 right-4 w-80 flex bg-blue-900 rounded-lg p-4 mb-4" role="alert">
      <svg class="w-5 h-5 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
      <div class="ml-3 text-sm font-medium text-white">
          {{ session('status') }}
      </div>
  </div>
@endif

    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                    <form role="form" method="POST" action="{{route('dashboard.project.job.update', $job->id)}}">
                      @method('PUT')
                        @csrf

                        <input type="hidden" name="project_id" value="{{ $job->project_id}}">

                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Project<span class="text-red-600">*</span></label>
                      <div class="">
                        <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('name') ? ' is-invalid' : '' }}"
                        placeholder="Job Name" aria-label="Job" autocomplete="off" aria-describedby="Job-addon" name="name" value="{{old('name', $job->name)}}" require/>
                        @if($errors->has('name'))
                            <div class="text-red-600">{{$errors->first('name')}}</div>
                        @endif
                      </div>

                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Description</label>
                      <div class="mb-10">
                        <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('description') ? ' is-invalid' : '' }}"
                        placeholder="Description Job" autocomplete="off" aria-label="Description" aria-describedby="description-addon" name="description" value="{{old('description', $job->description)}}" require/>
                        @if($errors->has('description'))
                            <div class="text-red-600">{{$errors->first('description')}}</div>
                        @endif
                      </div>

                      <div class="mb-4">
                        <select id="worker_id"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('worker_id') ? ' is-invalid' : '' }}"
                            name="worker_id">
                            <option value="">Worker</option>
                            @foreach ($worker as $data)
                              @if ( old('worker_id', $job->worker_id) == $data->id )
                              <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                              @else
                              <option value="{{ $data->id }}">{{ $data->name }}</option>
                              @endif
                            @endforeach
                        </select>
                        @if($errors->has('worker_id'))
                            <div class="text-red-600">{{$errors->first('worker_id')}}</div>
                        @endif
                      </div>

                      <div class="mb-4">
                        <select id="type_id"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('type_id') ? ' is-invalid' : '' }}"
                            name="type_id">
                            @if ( old('type_id', $job->type_id) == $job->type_id )
                              <option value="{{ $job->type_id }}" selected>--{{ $job->type_id }}--</option>
        
                              <option value="Main">Main</option>
                              <option value="Additional">Additional</option>
                              <option value="other">other</option>
                            @endif
     
                        </select>
                        @if($errors->has('type_id'))
                            <div class="text-red-600">{{$errors->first('type_id')}}</div>
                        @endif
                      </div>

     
                      <div class="mb-4">
                        <select id="status"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('status') ? ' is-invalid' : '' }}"
                            name="status">
                            @if ( old('status', $job->status) == $job->status )
                            <option value="{{ $job->status }}" selected>--{{ $job->status }}--</option>
                            <option value="To Do">To Do</option>
                            <option value="Proggress">Progress</option>
                            <option value="Done">Done</option>
                            @endif
     
                        </select>
                        @if($errors->has('status'))
                            <div class="text-red-600">{{$errors->first('status')}}</div>
                        @endif
                      </div>

                      <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
                        <div>
                            <label class="font-bold text-lg" for="file">File</label>
                        </div>
                        <div class="col-span-5">
                            <input id="file" type="file"
                                class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('file') ? 'is-invalid' : '' }}"
                                name="file" value="{{old('file', $job->file)}}" />
                            @if($errors->has('file'))
                            <div class="text-red-600 italic">{{ $errors->first('file') }}</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
                        <div>
                            <label class="font-bold text-lg" for="img">Image</label>
                        </div>
                        <div class='flex flex-col items-center justify-center w-full'>
                            <label for="img"
                                class='flex flex-col border-4 border-dashed w-full h-46 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7 pb-4'>
                                    <img class="img-preview w-56 h-40 object-cover object-center border-2 border-dashed">
                                    {{-- <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> --}}
                                    <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                        Select a photo</p>
                                </div>
                                <input id="img" value="{{old('img', $job->img)}}" name="img" type='file'
                                    class="{{ $errors->has('img') ? 'is-invalid' : '' }}" />
                            </label>
                        </div>
                    </div>
                    

                      <div class="text-left">
                        <button type="submit" class="inline-block px-6 py-3 mt-6 mb-0 font-bold text-cente uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85 text-white">Update</button>
                        <a href="{{ url('dashboard/project') }}/{{ $job->project_id }}/{{ 'jobs' }}" class="inline-block px-6 py-3 mt-6 mb-0 font-bold text-cente uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-600 to-slate-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85 text-white" >Back</a>
                      </div>
                    </form>
                  </div>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/datepicker.bundle.js"></script>
<script>

var element = document.getElementById('back-link');

// Provide a standard href to facilitate standard browser features such as 
//  - Hover to see link
//  - Right click and copy link
//  - Right click and open in new tab
element.setAttribute('href', document.referrer);

// We can't let the browser use the above href for navigation. If it does, 
// the browser will think that it is a regular link, and place the current 
// page on the browser history, so that if the user clicks "back" again,
// it'll actually return to this page. We need to perform a native back to
// integrate properly into the browser's history behavior
element.onclick = function() {
  history.back();
  return false;
}

   document.addEventListener("alpine:init", () => {
  Alpine.data("multiselect", () => ({
    style: {
      wrapper: "w-full relative",
      select:
        "border w-full border-gray-300 rounded-lg py-2 px-2 text-sm flex gap-2 items-center cursor-pointer bg-white",
      menuWrapper:
        "w-full rounded-lg py-1.5 text-sm mt-1 shadow-lg absolute bg-white z-10",
      menu: "max-h-52 overflow-y-auto",
      textList: "overflow-x-hidden text-ellipsis grow whitespace-nowrap",
      trigger: "px-2 py-2 rounded bg-neutral-100",
      badge: "py-1.5 px-3 rounded-full bg-neutral-100",
      search:
        "px-3 py-2 w-full border-0 border-b-2 border-neutral-100 pb-3 outline-0 mb-1",
      optionGroupTitle:
        "px-3 py-2 text-neutral-400 uppercase font-bold text-xs sticky top-0 bg-white",
      clearSearchBtn: "absolute p-3 right-0 top-1 text-neutral-600",
      label: "hover:bg-neutral-50 cursor-pointer flex py-2 px-3"
    },

    icons: {
      times:
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><g xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="M6 18L18 6M18 18L6 6"/></g></svg>',
      arrowDown:
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><path xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-width="2" d="M5 10l7 7 7-7"/></svg>'
    },

    init() {
      const style = this.style;

      const originalSelect = this.$el;
      originalSelect.classList.add("hidden");

      const wrapper = document.createElement("div");
      wrapper.className = style.wrapper;
      wrapper.setAttribute("x-data", "newSelect");

      const newSelect = document.createElement("div");
      newSelect.className = style.select;
      newSelect.setAttribute("x-bind", "selectTrigger");

      const textList = document.createElement("span");
      textList.className = style.textList;

      const triggerBtn = document.createElement("button");
      triggerBtn.className = style.trigger;
      triggerBtn.innerHTML = this.icons.arrowDown;

      const countBadge = document.createElement("span");
      countBadge.className = style.badge;
      countBadge.setAttribute("x-bind", "countBadge");

      newSelect.append(textList);
      newSelect.append(countBadge);
      newSelect.append(triggerBtn);

      const menuWrapper = document.createElement("div");
      menuWrapper.className = style.menuWrapper;
      menuWrapper.setAttribute("x-bind", "selectMenu");

      const menu = document.createElement("div");
      menu.className = style.menu;

      const search = document.createElement("input");
      search.className = style.search;
      search.setAttribute("x-bind", "search");
      search.setAttribute("placeholder", "filter");

      const clearSearchBtn = document.createElement("button");
      clearSearchBtn.className = style.clearSearchBtn;
      clearSearchBtn.setAttribute("x-bind", "clearSearchBtn");
      clearSearchBtn.innerHTML = this.icons.times;

      menuWrapper.append(search);
      menuWrapper.append(menu);
      menuWrapper.append(clearSearchBtn);

      originalSelect.parentNode.insertBefore(
        wrapper,
        originalSelect.nextSibling
      );

      const itemGroups = originalSelect.querySelectorAll("optgroup");

      if (itemGroups.length > 0) {
        itemGroups.forEach((itemGroup) => processItems(itemGroup));
      } else {
        processItems(originalSelect);
      }

      function processItems(parent) {
        const items = parent.querySelectorAll("option");
        const subMenu = document.createElement("ul");
        const groupName = parent.getAttribute("label") || null;

        if (groupName) {
          const groupTitle = document.createElement("h5");
          groupTitle.className = style.optionGroupTitle;
          groupTitle.innerText = groupName;
          groupTitle.setAttribute("x-bind", "groupTitle");
          menu.appendChild(groupTitle);
        }

        items.forEach((item) => {
          const li = document.createElement("li");
          li.setAttribute("x-bind", "listItem");

          const checkBox = document.createElement("input");
          checkBox.classList.add("mr-3", "mt-1");
          checkBox.type = "checkbox";
          checkBox.value = item.value;
          checkBox.id = originalSelect.name + "_" + item.value;

          const label = document.createElement("label");
          label.className = style.label;
          label.setAttribute("for", checkBox.id);
          label.innerText = item.innerText;

          checkBox.setAttribute("x-bind", "checkBox");

          if (item.hasAttribute("selected")) {
            checkBox.checked = true;
          }
          label.prepend(checkBox);
          li.append(label);
          subMenu.appendChild(li);
        });
        menu.appendChild(subMenu);
      }

      wrapper.appendChild(newSelect);
      wrapper.appendChild(menuWrapper);

      Alpine.data("newSelect", () => ({
        open: false,
        showCountBadge: false,
        items: [],
        selectedItems: [],
        filterBy: "",
        init() {
          this.regenerateTextItems();
        },

        regenerateTextItems() {
          this.selectedItems = [];
          this.items.forEach((item) => {
            const checkbox = item.querySelector("input[type=checkbox]");
            const text = item.querySelector("label").innerText;
            if (checkbox.checked) {
              this.selectedItems.push(text);
            }
          });

          if (this.selectedItems.length > 1) {
            this.showCountBadge = true;
          } else {
            this.showCountBadge = false;
          }

          if (this.selectedItems.length === 0) {
            textList.innerHTML = '<span class="text-neutral-400">select</span>';
          } else {
            textList.innerText = this.selectedItems.join(", ");
          }
        },

        selectTrigger: {
          ["@click"]() {
            this.open = !this.open;

            if (this.open) {
              this.$nextTick(() =>
                this.$root.querySelector("input[x-bind=search]").focus()
              );
            }
          }
        },
        selectMenu: {
          ["x-show"]() {
            return this.open;
          },
          ["x-transition"]() {},
          ["@keydown.escape.window"]() {
            this.open = false;
          },
          ["@click.away"]() {
            this.open = false;
          },
          ["x-init"]() {
            this.items = this.$el.querySelectorAll("li");
            this.regenerateTextItems();
          }
        },
        checkBox: {
          ["@change"]() {
            const checkBox = this.$el;

            if (checkBox.checked) {
              originalSelect
                .querySelector("option[value='" + checkBox.value + "']")
                .setAttribute("selected", true);
            } else {
              originalSelect
                .querySelector("option[value='" + checkBox.value + "']")
                .removeAttribute("selected");
            }
            this.regenerateTextItems();
          }
        },
        countBadge: {
          ["x-show"]() {
            return this.showCountBadge;
          },
          ["x-text"]() {
            return this.selectedItems.length;
          }
        },
        search: {
          ["@keydown.escape.stop"]() {
            this.filterBy = "";
            this.$el.blur();
          },
          ["@keyup"]() {
            this.filterBy = this.$el.value;
          },
          ["x-model"]() {
            return this.filterBy;
          }
        },
        clearSearchBtn: {
          ["@click"]() {
            this.filterBy = "";
          },
          ["x-show"]() {
            return this.filterBy.length > 0;
          }
        },
        listItem: {
          ["x-show"]() {
            return (
              this.filterBy === "" ||
              this.$el.innerText
                .toLowerCase()
                .startsWith(this.filterBy.toLowerCase())
            );
          }
        },
        groupTitle: {
          ["x-show"]() {
            if (this.filterBy === "") return true;

            let atLeastOneItemIsShown = false;

            this.$el.nextElementSibling
              .querySelectorAll("li")
              .forEach((item) => {
                console.log(this.filterBy);
                if (
                  item.innerText
                    .toLowerCase()
                    .startsWith(this.filterBy.toLowerCase())
                )
                  atLeastOneItemIsShown = true;
              });
            return atLeastOneItemIsShown;
          }
        }
      }));
    }
  }));
});
</script>

@endsection