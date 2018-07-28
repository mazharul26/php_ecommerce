 <form >
                            <label>Country</label>
                            <select name="country">
                                <option value="0">Select a Country</option>
                                <?php
                                $cities = $data->view('city', '', array('city_name', 'ASC'), '');

                                while ($city = $cities->fetch_object()) {
                                    echo "<option value='{$city->id}'>{$city->city_name}</option>";
                                }
                                ?>
                            </select>


                        </form>