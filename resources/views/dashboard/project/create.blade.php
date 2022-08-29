@extends('dashboard.app')
@section('title','Project')
@section('head', 'Project')
@section('header', 'Project')
@section('content')


    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                    <form role="form" method="POST" action="{{route('dashboard.project.store')}}">
                      @csrf

                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Project<span class="text-red-600">*</span></label>
                      <div class="mb-4">
                        <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('name') ? ' is-invalid' : '' }}"
                        placeholder="Project Name" aria-label="Project" aria-describedby="project-addon" name="name" value="{{old('name')}}" require/>
                        @if($errors->has('name'))
                            <div class="text-red-600">{{$errors->first('name')}}</div>
                        @endif
                      </div>

                      <div class="mb-4">
                        <select id="customer_id"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('customer_id') ? ' is-invalid' : '' }}"
                            name="customer_id">
                            <option value="">Customer</option>
                            @foreach ($customers as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('customer_id'))
                            <div class="text-red-600">{{$errors->first('customer_id')}}</div>
                        @endif
                      </div>

                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="proposal_date">Proposal Date<span class="text-red-600">*</span></label>
                      <div class=" justify-between grid-cols-6 gap-4 my-3">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input id="proposal_date" datepicker="" datepicker-format="yyyy/mm/dd" type="text" name="proposal_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                                focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 {{ $errors->has('proposal_date') ? ' is-invalid' : '' }}"
                                        data-toggle="datetimepicker" data-target="#datetimepicker"
                                    placeholder="Select date" value="{{old('proposal_date')}}" require>
                            </div>
                            @if($errors->has('proposal_date'))
                                <div class="text-red-600">{{$errors->first('proposal_date')}}</div>
                            @endif
                        </div>

                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Description<span class="text-red-600">*</span></label>
                        <div class="mb-4">
                          <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow {{ $errors->has('description') ? ' is-invalid' : '' }}"
                          placeholder="Description Project" aria-label="Description" aria-describedby="description-addon" name="description" value="{{old('description')}}" require/>
                          @if($errors->has('description'))
                              <div class="text-red-600">{{$errors->first('description')}}</div>
                          @endif
                        </div>

                      <div class="text-left">
                        <button type="submit" class="inline-block px-6 py-3 mt-6 mb-0 font-bold text-cente uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Create</button>
                      </div>
                    </form>
                  </div>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/datepicker.bundle.js"></script>
<script>
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