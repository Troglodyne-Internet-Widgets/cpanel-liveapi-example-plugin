PATH_TO_REPO := $(shell git rev-parse --show-toplevel )

all: install

install:
	mkdir -p /usr/local/cpanel/base/frontend/paper_lantern/qa_cpanel_liveapi_demonstrator
	cp -r  ./qa_cpanel_liveapi_demonstrator /usr/local/cpanel/base/frontend/paper_lantern/
	tar -cvzf qa_doinitlive_api.tar.gz qa_doinitlive_api/*
	/usr/local/cpanel/scripts/install_plugin ${PATH_TO_REPO}/qa_doinitlive_api.tar.gz
	rm qa_doinitlive_api.tar.gz

uninstall:
	[ -d /usr/local/cpanel/base/frontend/paper_lantern/qa_cpanel_liveapi_demonstrator ] && rm -rf /usr/local/cpanel/base/frontend/paper_lantern/qa_cpanel_liveapi_demonstrator
