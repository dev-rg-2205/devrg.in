
<!--  ------------------------------------------ Page Banner Modal -----------------------------------------    -->

<!-- View Page Banner  Modal -->
<div class="modal fade" id="pageBannerViewModel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Page Banner</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <img id="modalViewPageBannerImage" class="img-fluid rounded" alt="Blog Image">
            </div>

        </div>
    </div>
</div>

<!-- Add Page Banner Modal -->
<div class="modal fade" id="addPageBannerModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Page Banner</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="pageBannerForm" enctype="multipart/form-data">
                <div class="modal-body">

                   <div class="form-group">
                        <label>Page Name</label>
                        <input type="text" name="pageName" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label>Title (Optional)</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                
                    <div class="form-group">
                        <label>Sub Title (Optional)</label>
                         <input type="text" name="subTitle" class="form-control">
                   </div>

                     <div class="form-group">
                        <label>Description (Optional)</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>


                    <div class="form-group">
                        <label>Image (Optional)</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Project
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Page Banner Modal -->
<div class="modal fade" id="updatePageBannerModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Page Banner</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updatePageBannerForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentPageBannerId" name="id">

          <div class="form-group">
            <label>Page Name</label>
            <input type="text" id="currentPageBannerPageName" name="pageName" class="form-control" required>
           </div>

          <div class="form-group">
            <label>Title (Optional)</label>
            <input type="text" id="currentPageBannerTitle" name="title" class="form-control">
           </div>

          <div class="form-group">
            <label>Sub Title (Optional)</label>
            <input type="text" id="currentPageBannerSubTitle" name="subTitle" class="form-control">
          </div>

          <div class="form-group">
            <label>Description (Optional)</label>
            <textarea id="currentPageBannerDescription" name="description" class="form-control"></textarea>
          </div>


           <div class="form-group">
              <label>Current Image</label><br>
              <img id="currentPageBannerImage"
                  src=""
                  style="max-width:150px; display:none; margin-bottom:10px;">
           </div>

            <div class="form-group">
                <label>Change Image (Optional)</label>
                <input type="file" name="updatedPageBannerImage" class="form-control">
            </div>
        
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Page Banner</button>
        </div>
      </form>

    </div>
  </div>
</div>



<!--  ------------------------------------------ Skill Modal -----------------------------------------    -->

<!-- Add Skill Modal -->
<div class="modal fade" id="addSkillModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Skill</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="skillForm" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                
                    <div class="form-group">
                        <label>Score (0-100)</label>
                        <input type="number" name="score" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Skill
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Skill Modal -->
<div class="modal fade" id="updateSkillModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Skill</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updateSkillForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentSkillId" name="id">

          <div class="form-group">
            <label>Title</label>
            <input type="text" id="currentSkillTitle" name="title" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Score (0-100)</label>
            <input type="number" id="currentSkillScore" name="score" class="form-control" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Service</button>
        </div>
      </form>

    </div>
  </div>
</div>



<!--  ------------------------------------------ Service Modal -----------------------------------------    -->

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Service</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="serviceForm" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Service
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Service Modal -->
<div class="modal fade" id="updateServiceModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Service</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updateServiceForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentServiceId" name="id">

          <div class="form-group">
            <label>Title</label>
            <input type="text" id="currentServiceTitle" name="title" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" id="currentServiceDescription" name="description" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Icon</label>
            <input type="text" id="currentServiceIcon" name="icon" class="form-control" required>
          </div>
       
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Service</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!--  ------------------------------------------ Experience Modal -----------------------------------------    -->

<!-- Add Experience Modal -->
<div class="modal fade" id="addExperienceModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Experience</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="experienceForm" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" required>
                    </div>

                
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="companyName" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Start Month & Year</label>
                        <input type="month" name="startYear" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>End Month & Year (Optional)</label>
                        <input type="month" name="endYear" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Experience
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Experience Modal -->
<div class="modal fade" id="updateExperienceModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Experience</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updateExperienceForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentExperienceId" name="id">

          <div class="form-group">
            <label>Designation</label>
            <input type="text" id="currentExperienceDesignation" name="designation" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Company Name</label>
            <input type="text" id="currentExperienceCompanyName" name="companyName" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Start Month & Year</label>
            <input type="month" id="currentExperienceStartYear" name="startYear" class="form-control" required>
          </div>

          <div class="form-group">
            <label>End Month & Year (Optional)</label>
            <input type="month" id="currentExperienceEndYear" name="endYear" class="form-control">
          </div>

          <div class="form-group">
            <label>Detail</label>
            <textarea id="currentExperienceDetail" name="detail" class="form-control"></textarea>
          </div>
        
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Education</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!--  ------------------------------------------ Education Modal -----------------------------------------    -->

<!-- Add Education Modal -->
<div class="modal fade" id="addEducationModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Education</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="educationForm" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Course</label>
                        <input type="text" name="course" class="form-control" required>
                    </div>

                
                    <div class="form-group">
                        <label>University</label>
                        <input type="text" name="university" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Start Month & Year</label>
                        <input type="month" name="startYear" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>End Month & Year (Optional)</label>
                        <input type="month" name="endYear" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Education
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Education Modal -->
<div class="modal fade" id="updateEducationModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Education</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updateEducationForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentEducationId" name="id">

          <div class="form-group">
            <label>Course</label>
            <input type="text" id="currentEducationCourse" name="course" class="form-control" required>
          </div>

          <div class="form-group">
            <label>University</label>
            <input type="text" id="currentEducationUniversity" name="university" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Start Month & Year</label>
            <input type="month" id="currentEducationStartYear" name="startYear" class="form-control" required>
          </div>

          <div class="form-group">
            <label>End Month & Year (Optional)</label>
            <input type="month" id="currentEducationEndYear" name="endYear" class="form-control">
          </div>

          <div class="form-group">
            <label>Detail</label>
            <textarea id="currentEducationDetail" name="detail" class="form-control"></textarea>
          </div>
        
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Education</button>
        </div>
      </form>

    </div>
  </div>
</div>



<!--  ------------------------------------------ Project Modal -----------------------------------------    -->


<!-- View Project Logo Modal -->
<div class="modal fade" id="projectLogoViewModel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Project Logo</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <img id="modalViewProjetLogoImage" class="img-fluid rounded" alt="Blog Image">
            </div>

        </div>
    </div>
</div>

<!-- Add Projectt Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="projectForm" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                
                    <div class="form-group">
                        <label>URL</label>
                         <input type="url" name="url" class="form-control" required>
                   </div>

                   <!-- Project Type Spinner -->
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control" required>
                            <option value="" disabled selected>Select Type</option>
                            <option value="Android">Android</option>
                            <option value="iOS">iOS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Project
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Project Modal -->
<div class="modal fade" id="updateProjectModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updateProjectForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentProjectId" name="id">

          <div class="form-group">
            <label>Name</label>
            <input type="text" id="currentProjectName" name="name" class="form-control" required>
          </div>

          <div class="form-group">
            <label>URL</label>
           <input type="url" id="currentProjectUrl" name="url" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Type</label>
                       <select name="type" id="currentProjectType" class="form-control" required>
                          <option value="" disabled>Select Type</option>
                          <option value="Android">Android</option>
                          <option value="iOS">iOS</option>
                        </select>
           </div>

           <div class="form-group">
              <label>Current Image</label><br>
              <img id="currentProjectImage"
                  src=""
                  style="max-width:150px; display:none; margin-bottom:10px;">
           </div>

            <div class="form-group">
                <label>Change Image</label>
                <input type="file" name="updatedProjectImage" class="form-control">
            </div>
        
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!--  ------------------------------------------ Blogs Modal -----------------------------------------    -->


<!-- View Blog Image Modal -->
<div class="modal fade" id="blogImageViewModel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Blog Image</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <img id="modalBlogImage" class="img-fluid rounded" alt="Blog Image">
            </div>

        </div>
    </div>
</div>

<!-- Add Blog Modal -->
<div class="modal fade" id="addBlogModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Blog</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="blogForm" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                         <input type="url" name="url" class="form-control" required>
                   </div>

                   
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Blog
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Update Blog Modal -->
<div class="modal fade" id="updateBlogModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Blog</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form id="updateBlogForm" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" id="currentBlogId" name="id">

          <div class="form-group">
            <label>Title</label>
            <input type="text" id="currentBlogTitle" name="title" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Subject</label>
            <input type="text" id="currentBlogSubject" name="subject" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Content</label>
            <textarea id="currentBlogContent" name="content" class="form-control" rows="4" required></textarea>
          </div>

             <div class="form-group">
            <label>URL</label>
             <input type="text" id="currentBlogUrl" name="url" class="form-control" required>
            </div>

           <div class="form-group">
                 <label>Current Image</label><br>
                    <img id="currentBlogImage"
                        src=""
                        style="max-width:150px; display:none; margin-bottom:10px;">
            </div>
             
            <div class="form-group">
                <label>Change Image</label>
                <input type="file" name="image" class="form-control">
            </div>
        
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>




<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
            </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
        </div>
    </div>
</div>


