.PHONY: less

setup:
	git submodule init

less:
	@scripts/less.sh --no-watch

lesswatch:
	@scripts/less.sh
